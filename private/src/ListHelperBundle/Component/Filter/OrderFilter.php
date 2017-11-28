<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ListHelperBundle\Component\Filter;

use ListHelperBundle\Component\Data\Filter as DataFilter;
use ListHelperBundle\Component\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderFilter extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        // Set default
        $resolver->setDefaults([
            'type' => Type\OrderType::class
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataFilters()
    {
        $dataFilter = new DataFilter\OrderDataFilter();

        $form = $this->getType();
        if ($form) {
            $dataFilter->setOrderBy($form->get('orderby')->getData());
            $dataFilter->setOrderWay($form->get('orderway')->getData());
        }

        return [$dataFilter];
    }
}