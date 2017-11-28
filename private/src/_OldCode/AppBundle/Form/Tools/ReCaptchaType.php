<?php
namespace AppBundle\Form\Tools;

use AppBundle\CustomeValidator\ContainsReCaptcha;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

class ReCaptchaType extends AbstractType
{
    private $recaptchaPublicKey;
    private $recaptchaPrivateKey;

    public function __construct($recaptchaPublicKey, $recaptchaPrivateKey)
    {
        $this->recaptchaPublicKey = $recaptchaPublicKey;
        $this->recaptchaPrivateKey = $recaptchaPrivateKey;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gRecaptchaResponse', Type\HiddenType::class,
                [   'constraints' => [new ContainsReCaptcha(['recaptchaPrivateKey' => $this->recaptchaPrivateKey])],
                    'attr' => [
                        'class' => 'g-recaptcha-response'
                    ]])
            ->add('submit', Type\SubmitType::class,
                [
                    'attr' => [
                        'class' => 'btn btn-primary g-recaptcha',
                        'data-sitekey' => $this->recaptchaPublicKey,
                        'data-callback' => "onSubmit"]])
        ;
    }
}