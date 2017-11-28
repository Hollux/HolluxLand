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

use ListHelperBundle\Component\Filter;
use ListHelperBundle\Component\Transformer;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class ActionElement extends ListElement
{
	/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        
        // Need path
        $resolver->setRequired('path');    
        
        // Set allowed types
        $resolver->setAllowedTypes('path', 'string');               
                            
    }
}
