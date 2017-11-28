<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace ListHelperBundle\Component\Element;

use ListHelperBundle\Component\ElementInterface;
use ListHelperBundle\Component\ListView;
use ListHelperBundle\Component\RegistryInterface;
use ListHelperBundle\Component\Util\StringUtil;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractElement implements ElementInterface
{
    /**
     * RegistryInterface
     */
    private $registry = array();

    /**
     * {@inheritdoc}
     */
    public function getOptionsResolver() : OptionsResolver
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        return $resolver;
    }

	/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                    'name'  => $this->getName(),
                    'data'  => null,
                    ])
        ;

        // Set allowed types
        $resolver->setAllowedTypes('name', 'string');
    }
    
	/**
     * {@inheritdoc}
     */  
    public function setRegistry(RegistryInterface $registry)
    {
        $this->registry = $registry;
        
        return $this;
    }
    
	/**
     * {@inheritdoc}
     */  
    public function finishView(ListView $view)
    {
        return $this;
    }
    
	/**
     * {@inheritdoc}
     */
    public function getName()
    {
        return StringUtil::fqcnToBlockPrefix(get_class($this));    
    }    
}
