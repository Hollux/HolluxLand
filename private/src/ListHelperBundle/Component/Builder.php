<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace ListHelperBundle\Component;

use ListHelperBundle\Component\Element\ColumnElement;
use ListHelperBundle\Component\Element\OrderElement;
use ListHelperBundle\Component\Exception\UnexpectedTypeException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Builder implements BuilderInterface
{
    /**
     * @var RegistryInterface
     */
    private $registry;  

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;   
    
    /**
     * @var ElementInterface
     */
    private $element;
    
    /**
     * @var array
     */
    private $options;    
    
    /**
     * @var listHelper
     */
    private $listHelper;    

    /**
     * Constructor.
     *
     * @param RegistryInterface         $registry       The registry for find elements
     * @param DataResolverInterface     $dataResolver   The data resolver for resolve data
     * @param FormFactoryInterface      $formFactory    The formFactory to construct form         
     * @param ElementInterface          $element        The element for build list
     * @param array                     $options        The option of this builder
     */	
    public function __construct(RegistryInterface $registry, DataResolverInterface $dataResolver, FormFactoryInterface $formFactory, ElementInterface $element, array $options = [])
    {
        $this->registry     = $registry;
        $this->formFactory  = $formFactory;
        $this->element      = $element;
        
        // Resolve data
        if(isset($options['data']))
            $options['data'] = $dataResolver->resolve($options['data']);

        $this->options = $this->element->getOptionsResolver()->resolve($options);
    }

    /**
     * {@inheritdoc}
     */
    public function add($name, $element = ColumnElement::class, array $options = array())
    {
        if(null === $element)
            $element = ColumnElement::class;
            
	    if (!is_string($element)) {
            throw new UnexpectedTypeException($element, 'string');
        }
    
        if(null === $this->listHelper)
            $this->listHelper = $this->createList();
            
        // get the element
        $element = $this->registry->getElement($element);

        // Get OptionsResolver of the element
        $optionResolver = $element->getOptionsResolver();

        //Add name to options if not exist
        if(!isset($options['name']) && $optionResolver->isDefined('name'))
            $options['name'] = $name;            

        // Add to elements list
        $this->listHelper->add($name, new ListHelper($element->getName(), $optionResolver->resolve($options), $element));
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function createList()
    {

        $this->listHelper = new ListHelper( $this->element->getName(), $this->options, $this->element);
        $this->listHelper->setForm($this->formFactory->create());
        
        $this->element->buildList($this, $this->options);

        if(!in_array('order', $this->listHelper->getTags())) {
            $this->add('order', OrderElement::class);
        }

        return $this->listHelper;
    }    
}