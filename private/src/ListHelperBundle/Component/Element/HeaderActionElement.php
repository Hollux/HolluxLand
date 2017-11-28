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

use Symfony\Component\OptionsResolver\OptionsResolver;

class HeaderActionElement extends ActionElement
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

        $resolver->setDefaults([
            'name' => $this->getName(),
            'data' => null,
            'class' => '',
        ]);

    }
}
