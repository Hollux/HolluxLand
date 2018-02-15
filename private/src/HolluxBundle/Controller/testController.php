<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use VetBundle\Form\ChoiceStringType;


class testController extends Controller
{
    /**
     * @Route("/test", name="test")
     * @Template
     */
    public function testAction(Request $request)
    {
        $class = new \stdClass();

        $form = $this->createFormBuilder($class)
            //->add('text', ChoiceStringType::class)
            ->add('bacteriologie', ChoiceStringType::class, [
                'label' => 'identification',
                'mapped' => false,
                'attr' => ['class' => 'form-control select-other','data-parent' => 'bacteriologiebrucella','data-other' => 'bacteriologieidentificationbrucellaautre',],
                'placeholder' => 'Choisir une valeure',
                'choices' => ['Abortus' => 'Abortus','Canis' => 'Canis','Melitensis' => 'Melitensis','Netomae' => 'Netomae','Ovis' => 'Ovis','Sp' => 'Sp','Suis' => 'Suis','Autre' => 'Autre',],
                'required' => false,
            ])
            ->add('submit', SubmitType::class, ['attr' => ["class" => 'btn btn-success']])
            ->getForm();

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/test2", name="test2")
     */
    public function test2Action()
    {
       $val = $this->get('test2.service')->getVal();

       dump($val);

       $this->get('test2.service')->addval('Crud');

        $val = $this->get('test2.service')->getVal();

       dump($val);exit;

    }


    /**
    * @Route("/testAjax", name="testAjax")
    */
    public function testAjaxAction()
    {
        echo"toto";exit;
    }

}