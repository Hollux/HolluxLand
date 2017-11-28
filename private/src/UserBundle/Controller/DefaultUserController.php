<?php
namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use UserBundle\Form;
use Symfony\Component\HttpFoundation\Request;

class DefaultUserController extends Controller
{

    /**
     * @Route("/login", name="login")
     * @Template
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return ['last_username' => $lastUsername, 'error' => $error];
    }

    /**
     * @Route("/register", name="register")
     * @Template
     */
    public function registerAction()
    {
        $this->UserHandler = $this->container->get('userBundle.form.handler.userhandler');
        $form              = $this->UserHandler->register();
        if(!$form) {
            return $this->redirectToRoute('login');
        }

        return ['form' => $form->createView()];
    }


    /**
     * @Route("/registerModal", name="registerModal")
     * @Template
     */
    public function registerModalAction()
    {
        $this->UserHandler = $this->container->get('userBundle.form.handler.userhandler');
        $form              = $this->UserHandler->register();

        if(!$form) {
            return new Response();
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/profil", name="profil")
     * @Template
     */
    public function profilAction()
    {
        $user              = $this->get('security.token_storage')->getToken()->getUser();
        $this->UserHandler = $this->container->get('userBundle.form.handler.userhandler');
        $form              = $this->UserHandler->profil($user);

        return ['user' => $user, 'form' => $form->createView()];
    }

    /**
     * @Route("/resetpassword/{token}", name="resetpassword")
     * @Template
     */
    public function resetpasswordAction($token = false, Request $request)
    {
        $this->UserHandler = $this->container->get('userBundle.form.handler.userhandler');
        $response          = $this->UserHandler->resetpassword($token);
        $token = $response['token'];
        $error = $response['error'];
        if(isset($response['action'])) {
            if($response['action'] instanceof UserInterface) {

                return $this->redirectToRoute('home');
            }
            if($response['action'] == 'login') {
                return $this->redirectToRoute('login');
            }
        }

        return ['token' => $token, 'error' => $error];
    }

}