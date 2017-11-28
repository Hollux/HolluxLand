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

final class Registry implements RegistryInterface
{
    /**
     * @var ElementInterface[]
     */
    private $unresolvedElements = [];

    /**
     * @var ElementInterface[]
     */
    private $elements = [];

    /**
     * @var RegistryExtensionInterface[]
     */
    private $extensions = [];

    /**
     * {@inheritdoc}
     */
    public function addExtension(RegistryExtensionInterface $extension)
    {
        $this->extensions[] = $extension;

        return $this;
    }

    /**
     * @return RegistryExtensionInterface[]
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    /**
     * {@inheritdoc}
     */
    public function addElement(ElementInterface $element, $alias = null)
    {
        // Add to unresolved element
        $this->unresolvedElements[get_class($element)] = $element;

        if (null !== $alias && get_class($element) !== $alias) {
            $this->unresolvedElements[$alias] = $element;
        }

        return $this;
    }

    /**
     * @return ElementInterface[]
     */
    public function getUnresolvedElements(): array
    {
        return $this->unresolvedElements;
    }

    /**
     * {@inheritdoc}
     */
    public function getElement($name)
    {
        // Not already in element array ?
        if (!isset($this->elements[$name])) {
            // Get unresolved element if existe
            $element = $this->unresolvedElements[$name] ?? null;
            unset($this->unresolvedElements[$name]);

            // Extend with Extended Resolver
            $this->extendElement($element, $name);

            // No element found, try to create
            $element = $element ?? new $name();

            // Not a ElementInterface, Exception
            if (!$element instanceof ElementInterface) {
                throw new InvalidArgumentException(sprintf('Could not load element "%s"', $name));
            }

            // Set element
            $element->setRegistry($this);
            $this->elements[$name] = $element;
        }

        return $this->elements[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function extendElement(ElementInterface $element = null, $name)
    {
        foreach ($this->extensions as $extension) {
            $element = $extension->extend($element, $name);
        }

        return $element;
    }
}
