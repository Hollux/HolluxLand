<?php
namespace AppBundle\Form\Tools;

use AppBundle\CustomeValidator\ContainsReCaptcha;
use AppBundle\CustomeValidator\ContainsReCaptchaValidator;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

trait SubmitRecaptcha
{
    public function submitRecaptchaBuilder(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('g-recaptcha-response', Type\HiddenType::class,
                [   'constraints' => [new ContainsReCaptcha()],
                    'attr' => [
                    'class' => 'g-recaptcha-response'
                ]])
            ->add('submit', Type\SubmitType::class,
                [
                    'attr' => [
                    'class' => 'btn btn-primary g-recaptcha',
                    'data-sitekey' => $options['recaptchaPublicKey'],
                    'data-callback' => "onSubmit"]])
        ;

    }

}