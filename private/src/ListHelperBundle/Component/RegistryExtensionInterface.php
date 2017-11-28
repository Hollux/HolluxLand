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

use ListHelperBundle\Component\Exception\InvalidArgumentException;

/**
 * The registry extension  form the ListHelper component.
 */
interface RegistryExtensionInterface
{
	/**
     * Extend a Element by name.
     *
     * @param mixed $element The element
     * @param string $name The name of the element*
     *
     * @return ElementInterface|null The element
     *
     * @throws Exception\InvalidArgumentException if the element can not be extended
     */
    public function extend($element, $name);
}