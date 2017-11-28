<?php
namespace UserBundle\Form\Handler;

use Symfony\Component\Security\Core\User\UserInterface;
use UserBundle\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Templating\EngineInterface;
use Doctrine\ORM\EntityManager;
use AppBundle\Component\Mailer\Message;
use AppBundle\Component\Mailer\MyCustomMailer;
use UserBundle\Event\TotoEvent;
use UserBundle\UserBundleEvents;

class UserHandler
{
	protected $form;
	protected $request;
	protected $em;
	protected $encoderFactory;
	protected $brochureUploader;
	protected $targetDir;
	protected $templating;
	protected $myCustomMailer;
	protected $userClassName;
    protected $userRegisterType;
    protected $userLoginType;
    protected $userProfilType;


	public function __construct(RequestStack $requestStack, EntityManager $em, FormFactoryInterface $formFactory,
	                            $encoderFactory, $brochureUploader, $targetDir, $resizeImage,
	                            EngineInterface $templating, MyCustomMailer $myCustomMailer,
                                $userClassName, $userRegisterType, $userLoginType, $userProfilType, $dispatcher)
	{
		$this->request          = $requestStack->getCurrentRequest();
		$this->formFactory      = $formFactory;
		$this->em               = $em;
		$this->encoderFactory   = $encoderFactory;
		$this->brochureUploader = $brochureUploader;
		$this->targetDir        = $targetDir;
		$this->resizeImage      = $resizeImage;
		$this->templating       = $templating;
		$this->myCustomMailer   = $myCustomMailer;
		$this->userClassName    = $userClassName;
		$this->userRegisterType = $userRegisterType;
        $this->userLoginType    = $userLoginType;
        $this->userProfilType   = $userProfilType;
        $this->dispatcher       = $dispatcher;
	}

	public function register()
	{

        $form = null;

        $user = new $this->userClassName();
        if ($user instanceof UserInterface) {
            $form = $this->formFactory->create($this->userRegisterType, $user);
            $form->handleRequest($this->request);
            if ($form->isSubmitted() && $form->isValid()) {
                $user = $user->setPassword($this->encoderFactory->getEncoder($user)
                    ->encodePassword($user->getPassword(), $user->getSalt()));
                $this->em->persist($user);
                $this->em->flush();
                $this->request->getSession()->getFlashBag()->add('success', 'user saves correctly');

                return null;
            }
        }

		return $form;
	}

	public function profil($user)
	{
	    echo'Page en cour de maintenance';
	    exit;

        $event = new TotoEvent($user);
        $this->dispatcher->dispatch(UserBundleEvents::EchoGetname, $event);

        echo'<pre>';
        var_dump($event->getResult());exit;

        //nom de l'ancien file
        $oldFile = $user->getFile();
        $form    = $this->formFactory->create($this->userProfilType, $user);
        $form->handleRequest($this->request);
        //le POST
		if($form->isSubmitted()) {
			if($form->isValid()) {
				$file = $user->getFile();
				if(null !== $file) {
					$fileName = $this->brochureUploader->upload($file);
					if($this->resizeImage->resize_image($this->targetDir.'/'.$fileName, 100, 100,
						$this->targetDir.'/'.$fileName)
					) {
						if($oldFile)
							if(is_file($this->targetDir.'/'.$oldFile))
								unlink($this->targetDir.'/'.$oldFile);
						$user->setFile($fileName);
					}
					else {
						$this->request->getSession()->getFlashBag()->add('error', "l'image n'est pas valide");
					}
				}
				else {
					$user->setFile($oldFile);
				}
				$this->em->persist($user);
				$this->em->flush();
			}
			else {
				$user->setFile($oldFile);
				$this->request->getSession()->getFlashBag()->add('error', "L'image doit être jpeg ou png");
			}
		}

		return $form;
	}

	public function resetpassword($token)
	{
		//valeurs de base
		$response          = [];
		$response['token'] = false;
		$response['error'] = null;
		//on envoit une adresse mail
		if(false == $token && $this->request->getMethod() == 'POST') {
			$user = $this->em->getRepository('HolluxBundle:User')->findOneByMail($this->request->get('_usermail'));
			if(!isset($user)) {
				$response['error'] = "adresse email inexistante ou fausse";
			}
			else {
				if(null == $user->getTokenMdp()) {
					//todo envoi du mail
					$response['action'] = $user;
					$user->setTokenMdp(hash('sha256', time()));
					$this->em->persist($user);
					$this->em->flush();
					$body = $this->templating->render('Mail/resetpassword.html.twig', ['user' => $user]);
					/*$cepoijpijez = new Message('ResetPassword Hollux.fr', 'hollux@hollux.com',
							$response['action']->getLogin(), $body);
					var_dump($cepoijpijez);exit;*/
					$this->myCustomMailer->send(new Message('ResetPassword Hollux.fr', 'hollux@hollux.fr',
							$response['action']->getLogin(), $body));
					$this->request->getSession()->getFlashBag()->add('success', "Email envoyé avec succés");
					//todo rediretion vers home avec flashbag
				}
				else {
					$response['error'] = "Un token vous as déjà été envoyé";
				}
			}
		}
		if(false !== $token) {
			$user = $this->em->getRepository('HolluxBundle:User')->findOneByTokenMdp($token);
			if(!isset($user)) {
				$response['error'] = "token inexistant ou faux";
			}
			else {
				$response['token'] = $token;
				if($this->request->getMethod() == 'POST') {
					$user = $user->setPassword($this->encoderFactory->getEncoder($user)
						->encodePassword($this->request->get('_password'), $user->getSalt()));
					$user->setTokenMdp(null);
					$this->em->persist($user);
					$this->em->flush();
					//todo redirection vers login avec flashbag
					$response['action'] = 'login';
				}
			}
		}

		return $response;
	}
}