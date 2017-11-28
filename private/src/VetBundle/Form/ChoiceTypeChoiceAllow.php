<?php
namespace VetBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ChoiceTypeChoiceAllow extends ChoiceType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($options) {

            dump($event->getData());exit;
            $options["choices"]['tamere'] = 'tamere';
            dump($options);
        });

        parent::buildForm($builder, $options);
    }
}