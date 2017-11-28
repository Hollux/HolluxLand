<?php
namespace ListBuilderBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;

class FigurineListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //RETIRE
        $builder
            ->add('figurine', FigurineType::class);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'ListBuilderBundle\Entity\List_Figurine']);
    }

    public function getName()
    {
        return 'Bundle_FigurineListType';
    }

}