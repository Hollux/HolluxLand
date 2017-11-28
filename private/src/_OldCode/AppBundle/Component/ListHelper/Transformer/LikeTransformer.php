<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Alcyon\CoreBundle\Component\ListHelper\Transformer;

use Symfony\Component\OptionsResolver\OptionsResolver;

class LikeTransformer extends StringTransformer
{
	/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        // Set Default
        $resolver->setDefaults(['prepend'    => '%',
                                'append'     => '%',
                                'striptags'   => false,
                                ]);
         
    } 
}