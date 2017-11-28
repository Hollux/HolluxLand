<?php
namespace VetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AnabelAbstractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $analyse = $event->getData();

            foreach ($form->all() as $child) {
                $options = $child->getConfig()->getOptions();

                if (isset($options['attr']['class'])
                    && preg_match('/select-other/i', $options['attr']['class'])
                ) {

                    // generation du champ autre
                    $form->add($child->getName() . 'autre', TextType::class,
                        ['mapped' => false,
                            'required' => false,
                            'attr' => [
                                'data-parent' => $child->getName() . 'autre',
                                'class' => 'form-control autre',
                            ]
                        ]);

                    if ($analyse) {
                        $data = $analyse->{'get' . ucfirst($child->getName())}();
                        if($data && isset($options['choices']) && !isset($options['choices'][$data])) {
                            $childOther = $form->get($child->getName() . 'autre');
                            $childOther->setData($data);

                            $child->setData('Autre');
                        }
                    }
                }
            }

        });

        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            $form = $event->getForm();
            $analyse = $event->getData();

            foreach ($form->all() as $child) {
                if ($form->has($child->getName() . 'autre') && $form->get($child->getName() . 'autre')->getData()) {
                    $analyse->{'set' . ucfirst($child->getName())}($form->get($child->getName() . 'autre')->getData());
                }
            }
        });
    }
}