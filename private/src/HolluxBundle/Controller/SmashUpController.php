<?php
namespace HolluxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="hollux.controller.smashup")
 */
class SmashUpController extends Controller
{
    protected $smashupHandler;
    protected $appServiceCache;

    public function __construct($smashupHandler, $appServiceCache) {
        $this->smashupHandler   = $smashupHandler;
        $this->appServiceCache = $appServiceCache;
    }

    /**
     * @Route("/smashUp", name="smashUp")
     * @Template
     */
    public function smashUpAction()
    {
        $result               = $this->smashupHandler->process();
        $form                 = $result['form'];
        $data                 = $result['data'];
        $factions             = $result['factions'];

        $this->appServiceCache->deleteItem('categories');
        $cachedCategories = $this->appServiceCache->getItem('categories');
        if (!$cachedCategories->isHit()) {
            $categories = 'tototo';
            $cachedCategories->set($categories);
            $this->appServiceCache->save($cachedCategories);
        } else {
            $categories = $cachedCategories->get();
            // var_dump($categories);exit;
        }


        return ['form' => $form->createview(),
            'data' => $data,
            'factions' => $factions];
    }

    /**
     * @Route("/smashUpReroll", name="smashUpReroll")
     * @Template
     */
    public function smashUpRerollAction(Request $request)
    {
        $data = $request->get('data');
        $factions =$request->get('factions');

        //etablis la fonction en random
        $factionRand = rand(0, count($factions) - 1);
        $faction     = $factions[$factionRand];
        //retire la faction du array
        array_splice($factions, $factionRand, 1);
        //met faction dans $data
        $data[$request->get('cibleJ')][$request->get('cibleF')]=$faction;
        //rajoute la faction changé
        $factions[] = $request->get('factionOld');
        //limite à 1 reroll
        $data[$request->get('cibleJ')]['attr'] = 1;

        return ['data' => $data,
            'factions' => $factions];
    }

}