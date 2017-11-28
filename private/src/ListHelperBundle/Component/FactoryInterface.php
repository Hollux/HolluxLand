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

use ListHelperBundle\Component\Element\ListElement;

/**
 * The central factory of the ListHelper component.
 */
interface FactoryInterface
{
	/**
     * Returns a ListHelper.
     *
     * @param string $element The element of the list
     * @param mixed  $data    The initial data
     * @param array  $options The options
     *
     * @return ListHelper The list created
     *
     * @throws \ListHelperBundle\Component\Exception\UnexpectedTypeException
     */
    public function create($element =  ListElement::class, $data = null, array $options = []);
    
	/**
     * Returns a list builder.
     *
     * @param string $element The element of the list
     * @param mixed  $data    The initial data
     * @param array  $options The options
     *
     * @return ElementInterface The list builder
     *
     * @throws \ListHelperBundle\Component\Exception\UnexpectedTypeException
     */
    public function createBuilder($element =  ListElement::class, $data = null, array $options = []);
}