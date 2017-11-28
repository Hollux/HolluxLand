<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/vuejs")
 * @package HolluxBundle\Controller
 */
class VueJSController extends Controller
{
    /**
     * @Route("/", name="indexVueJS")
     * @Template
     */
    public function indexVueJSAction()
    {
        $toto = 'toto';
        return['toto'=>$toto];
    }

    /**
     * @Route("/testvalue", name="testValueVueJS")
     * @Template
     */
    public function testValueVueJSAction($value = 'toto')
    {
        /*function isIntVal(value) {
            return (value >> 0).toString() === value;
        }*/

        return['value' => $value];
    }

}