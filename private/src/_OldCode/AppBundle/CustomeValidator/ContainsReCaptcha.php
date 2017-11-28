<?php
namespace AppBundle\CustomeValidator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsReCaptcha extends Constraint
{
    public $message = 'ReCaptcha non valide';
    public $recaptchaPrivateKey = '';

    public function getRequiredOptions()
    {
        return ['recaptchaPrivateKey'];
    }
}