<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\RouterInterface;
use HolluxBundle\Entity\Question;

class LoadQuestion extends AbstractFixture implements FixtureInterface
{

	public function load(ObjectManager $manager)
	{
		$arrayJeux   = [];
		$arrayJeux[] = ['jeux'     => $this->getReference('jeux1'),
		                'question' => ['alien', 'le seigneur des anneaux', 'spider-man', 'independence day', 'iron man',
			                'the big lebowski', 'leon', 'matrix', 'le silence des agneaux', 'les tortues ninja', 'tron',
			                'avatar', 'charlie et ses droles de dames', 'district 9', 'ghostbuster', 'inception',
			                'intouchable', 'karate kid', 'mars attaque', 'megamind', 'predator', 'psycho',
			                'ghostbuster', 'pulp fiction', 'spider-man', 'star-wars', 'terminator', 'shining',
			                'la haut', 'harry potter', 'gravity', 'le cinquieme element', 'le hobbit',
			                'little miss sunshine', 'monstre et cie', "oncean's eleven", 'i robot', 'marie a tout prix',
			                'avengers', 'king kong', 'indiana jones', 'fight club', 'the social network',
			                'insaisissable']];
		$arrayJeux[] = ['jeux'     => $this->getReference('jeux2'),
		                'question' => ['alien', 'le seigneur des anneaux', 'spider-man', 'independence day',
			                'the big lebowski']];
		//var_dump($arrayJeux);exit;
		foreach($arrayJeux as $jeuxX) {
			//var_dump($jeuxX);exit;
			$i = 1;
			foreach($jeuxX['question'] as $question) {
				$jeux = new Question();
				$jeux->setJeux($jeuxX['jeux']);
				$jeux->setNumber($i);
				$jeux->setQuestion($question);
				$manager->persist($jeux);
				$i++;
			}
		}
		$manager->flush();
	}
}