<?php
namespace AppBundle\Form\Handler;

use HolluxBundle\Entity\User;
use AppBundle\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManager;

class UserHandler
{
	protected $form;
	protected $request;
	protected $em;
	protected $encoderFactory;
	protected $brochureUploader;
	protected $targetDir;
	protected $resizeImage;

	public function __construct(RequestStack $requestStack, EntityManager $em, FormFactoryInterface $formFactory,
	                            $encoderFactory, $brochureUploader, $targetDir, $resizeImage)
	{
		$this->request          = $requestStack->getCurrentRequest();
		$this->formFactory      = $formFactory;
		$this->em               = $em;
		$this->encoderFactory   = $encoderFactory;
		$this->brochureUploader = $brochureUploader;
		$this->targetDir        = $targetDir;
		$this->resizeImage      = $resizeImage;
	}

	public function register()
	{
		$user = new User();
		$form = $this->formFactory->create(Form\RegisterType::class, $user);
		$form->handleRequest($this->request);
		if($form->isSubmitted() && $form->isValid()) {
			$user = $user->setPassword($this->encoderFactory->getEncoder($user)
				->encodePassword($user->getPassword(), $user->getSalt()));
			$this->em->persist($user);
			$this->em->flush();
			$this->request->getSession()->getFlashBag()->add('success', 'user saves correctly');

			return $user->getId();
		}

		return $form;
	}

	public function profil($user)
	{
		//nom de l'ancien file
		$oldFile = $user->getFile();
		$form    = $this->formFactory->create(Form\ProfilType::class, $user);
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
			$user = $this->em->getRepository('AppBundle:User')->findOneByMail($this->request->get('_usermail'));
			if(!isset($user)) {
				$response['error'] = "adresse email enexistante ou fausse";
			} else {
				if(null == $user->getTokenMdp()) {
					$user->setTokenMdp(hash('sha256', time()));
					$this->em->persist($user);
					$this->em->flush();
					//todo envoi du mail
					//todo rediretion vers home avec flashbag
					$response['action'] = $user;
				}
				else {
					$response['error'] = "Un token vous as déjà été envoyé";
				}
			}
		}
		if(false !== $token) {
			$user = $this->em->getRepository('AppBundle:User')->findOneByTokenMdp($token);
			if(!isset($user)) {
				$response['error'] = "token enexistant ou faux";
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