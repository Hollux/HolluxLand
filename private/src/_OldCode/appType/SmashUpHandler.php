<?php
namespace AppBundle\Form\Handler;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;
use AppBundle\Form\SmashUpType;

class SmashUpHandler
{
	protected $formFactory;
	protected $request;
	protected $em;

	public function __construct(RequestStack $requestStack, FormFactoryInterface $formFactory, EntityManager $em)
	{
		$this->request     = $requestStack->getCurrentRequest();
		$this->formFactory = $formFactory;
		$this->em          = $em;
	}

	public function process()
	{
		//recupere la base
		$SmashUpRepository = $this->em->getRepository("AppBundle:SmashUp");
		$base                 = $SmashUpRepository->findOneById(3);
		//creation du form avec base->collectionBoites->collectionFactions
		$form = $this->formFactory->create(SmashUpType::class, $base);
		//initialise Data
		$data = [];

		//si POST
		if($this->request->isMethod('POST')) {
			//initialise factions
			$factions = [];
			//remplis le form
			$form -> handleRequest($this->request);
			//remplis faction
			foreach($form->get('boites') as $boite)
			{
				foreach($boite->get('faction') as $faction) {
					$selectF = $faction->get('select');
					if($selectF->getData())
					{
						$factions[] = $faction->get('name')->getData();
					}
				}
			}
			//genere data
			//nombre de joueur pour la boucle
			$nbrJoueur = ($form->get('nbrJoueurs')->getData());
			for($i = 1; $i<= $nbrJoueur; $i++){
				$data['joueur'.$i] = [];
				//boucle 2fois pour 2factions/joueur
				for($j = 1; $j <= 2; $j++){
					//etablis la fonction en random
					$factionRand = rand(0, count($factions) - 1);
					$faction     = $factions[$factionRand];
					//retire la faction du array
					array_splice($factions, $factionRand, 1);
					//met faction dans $data
					$data['joueur'.$i][]=$faction;
				}
			}
		}

		return ['form' => $form, 'data' => $data];
	}
}