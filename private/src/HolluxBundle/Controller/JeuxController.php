<?php
namespace HolluxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserInterface;
use HolluxBundle\Entity\Jeux;
use HolluxBundle\Entity\Response;
use HolluxBundle\Form\ResponseType;
use HolluxBundle\Entity\TokenJeux;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route(service="hollux.controller.JeuxController")
 */
class JeuxController extends Controller
{
    protected $requestStack;
    protected $formFactory;
    protected $em;
    protected $tokenStorage;
    protected $router;

    public function __construct(RequestStack $requestStack, EntityManager $em, FormFactoryInterface $formFactory,
                                TokenStorageInterface $tokenStorage, $router)
    {
        $this->requestStack = $requestStack;
        $this->em           = $em;
        $this->formFactory  = $formFactory;
        $this->tokenStorage = $tokenStorage;
        $this->router       = $router;
    }

    /**
     * @Route("/jeux", name="jeux")
     * @Template
     */
    public function jeuxAction()
    {
        $request = $this->requestStack->getCurrentRequest();

        $data = [];
        // récupère le user
        $author = $this->tokenStorage->getToken()->getUser();
        // récupère le jeux
        $jeuxRepository = $this->em->getRepository("HolluxBundle:Jeux");
        $jeux           = $jeuxRepository->findJeuxQuestionByName('jeux');
        // récupère le token
        $tokenJeux = $this->tokenJeuxFonction($author, $jeux);
        //verif si response existe
        $responseRepository = $this->em->getRepository("HolluxBundle:Response");
        //voir pour rajouter le user à la DQB
        $response = $responseRepository->findOneByTokenJeuxAndQuestion($tokenJeux);
        //creation du form
        foreach($jeux->getQuestion() as $question) {
            if($tokenJeux->getNbrQuestion() == $question->getNumber()) {
                /*if(count($question->getResponse()) == 0)
                    $response = new Response();
                else
                    $response = $question->getResponse()->first();*/
                if($response) {
                }
                else {
                    $response = new Response();
                }
                //ajoute tokenJeux à response pour le Form
                $response->setTokenJeux($tokenJeux);
                $response->setQuestion($question);
                $form = $this->formFactory->create(ResponseType::class, $response);
                $form->handleRequest($request);
                break;
            }
        }
        // Je traite le post
        if($form->isSubmitted()) {
            //récupérer le champ
            $responseString = $form->get("response")->getData();
            //Question
            $questions = $jeux->getQuestion();
            foreach($questions as $quest) {
                if($quest->getNumber() == $tokenJeux->getNbrQuestion()) {
                    $question = $quest;
                    break;
                }
            }
            //Securite si il ne trouve pas de question
            if($question) {
            }
            else {
                $data = 'error question non trouve';
                //TODO PAS BON, RAJOUTER CONTRAINTE POUR NE PAS LIRE LA SUITE
                //TODO ET ATTEINDRE LE RETURN
                return ['form' => $form->createView(), 'data' => $data];
            }
            //test levenstein pour la validitee
            $isValid = $this->validJeux($question, $responseString);
            if($question->getNumber() == $tokenJeux->getNbrQuestion()) {
                //sauvegarder les donnees
                //if reponse existe pas , on le créé
                if(!$response->getId()) {
                    $response = $this->savPost($responseString, $isValid, $question, $tokenJeux, $jeux, $author);
                }
            }
            else {
                $data['post'] = 'error';
            }
            $form = $this->formFactory->create(ResponseType::class, $response);
        }
        //affichage si la réponse est bonne
        if($response->getId()) {
            $data['post'] = 'post OK';
            if($response->getIsValid() == 1) {
                $data[] = 'Bravo, Bonne réponse';
            }
            else {
                $data[] = 'faux ! mauvaise réponse';
            }
        }

        return ['form' => $form->createView(), 'data' => $data];
    }

    //FONCTIONS POUR LE JEUX
    //FONCTIONS POUR LE JEUX
    //FONCTIONS POUR LE JEUX
    //FONCTIONS POUR LE JEUX
    //FONCTIONS POUR LE JEUX
    public function tokenJeuxFonction(UserInterface $author, Jeux $jeux)
    {
        // cherche si un token correspondant au jeux existe
        $tokenRepository = $this->em->getRepository("HolluxBundle:TokenJeux");
        $tokenJeux       = $tokenRepository->findByAuthorGame($author, $jeux);
        //Si non tokenJeux reste vide et on le créer
        if(null == $tokenJeux) {
            $tokenJeux = $this->createToken($author, $jeux, $tokenJeux);
        }

        return $tokenJeux;
    }

    public function destroy($stringJeux)
    {
        // récupère le user
        $author = $this->tokenStorage->getToken()->getUser();
        // récupère le jeux
        $responseRepository = $this->em->getRepository("HolluxBundle:Jeux");
        $jeux               = $responseRepository->findJeuxQuestionByName($stringJeux);
        // récupère le token
        $tokenJeux = $this->tokenJeuxFonction($author, $jeux);
        $this->createToken($author, $jeux, $tokenJeux);
    }

    public function createToken($author, $jeux, $tokenJeux)
    {
        $tokenJeuxN = new TokenJeux();
        if(null != $tokenJeux) {
            $tokenJeuxN->setToken($tokenJeux->getToken() + 1);
        }
        else {
            $tokenJeuxN->setToken(1);
        }
        $tokenJeuxN->setNbrQuestion(1);
        $tokenJeuxN->setUser($author);
        $tokenJeuxN->setJeux($jeux);
        $tokenJeuxN->setResponseTrue(0);
        $tokenJeuxN->setNbrAnswered(0);
        $this->em->persist($tokenJeuxN);
        $this->em->flush();

        return $tokenJeuxN;
    }

    public function str_to_noaccent($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        return ($str);
    }

    public function savPost($responseString, $isValid, $question, $tokenJeux, $jeux, $user)
    {
        //TODO SECURITY NE PAS SAV UNE RESP DEJA SAV
        $response = new Response();
        $response->setResponse($responseString);
        $response->setIsValid($isValid);
        $response->setQuestion($question);
        $response->setTokenJeux($tokenJeux);
        $response->setUser($user);
        $tokenJeux->setResponseTrue($tokenJeux->getResponseTrue() + $isValid);
        $tokenJeux->setNbrAnswered($tokenJeux->getNbrAnswered() + 1);
        $this->em->persist($response);
        $this->em->persist($tokenJeux);
        $this->em->flush();

        return $response;
    }

    public function tokenJeuxClean($tokenJeux)
    {
        $token = preg_replace('/_[0-9]+/', '', $tokenJeux);

        return $token;
    }

    public function validJeux($question, $rep)
    {
        //mise en place du calcul
        $questionString = $this->responseClean($question->getQuestion());
        $calc           = ceil(strlen($questionString) / 4);
        $lev            = levenshtein($questionString, $rep);
        //calcul
        if($lev <= $calc) {
            $isValid = 1;
        }
        else {
            $isValid = 0;
        }

        return $isValid;
    }

    function responseClean($response)
    {
        $response = strtolower($response);
        $response = preg_replace('/[^a-z0-9-]+/', '-', $response);
        $response = strip_tags($response);

        return $response;
    }

    // FIN FONCTIONS POUR LE JEU
    // FIN FONCTIONS POUR LE JEU
    // FIN FONCTIONS POUR LE JEU
    // FIN FONCTIONS POUR LE JEU
    /**
     * @Route("/jeuxNext", name="jeuxNext")
     */
    public function jeuxNextAction()
    {
        // récupère le user
        $author = $this->tokenStorage->getToken()->getUser();
        // récupère le jeux
        $responseRepository = $this->em->getRepository("HolluxBundle:Jeux");
        $jeux               = $responseRepository->findJeuxQuestionByName('jeux');
        // récupère le token
        $tokenJeux = $this->tokenJeuxFonction($author, $jeux);
        $tokenJeux->setNbrQuestion($tokenJeux->getNbrQuestion() + 1);
        $this->em->persist($tokenJeux);
        $this->em->flush();

        return $this->redirectToRoute('jeux');
    }

    /**
     * @Route("/jeuxRetry", name="jeuxRetry")
     * @Template
     */
    public function jeuxRetryAction()
    {
        return [];
    }

    /**
     * @Route("/jeuxDestroy", name="jeuxDestroy")
     * @Template
     */
    public function jeuxDestroyAction()
    {
        // récupère le user
        $author = $this->tokenStorage->getToken()->getUser();
        // récupère le jeux
        $responseRepository = $this->em->getRepository("HolluxBundle:Jeux");
        $jeux               = $responseRepository->findJeuxQuestionByName('jeux');
        // récupère le token
        $tokenJeux = $this->tokenJeuxFonction($author, $jeux);
        $this->createToken($author, $jeux, $tokenJeux);

        return $this->redirectToRoute('jeux');
    }


    /**
     * @Route("/minijeux", name="minijeux")
     * @Template
     */
    public function minijeuxAction()
    {
        return [];
    }

    /**
     * @Route("/testCache", name="testCache")
     * @Template
     */
    public function testCacheAction()
    {
        return [];
    }

    //surcharge redirectToRoute avec service router
    protected function generateUrl($route, $parameters = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }
}