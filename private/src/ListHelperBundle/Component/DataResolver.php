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

final class DataResolver implements DataResolverInterface
{
    /**
     * @var DataInterface[]
     */
    private $supportClass = [];

    /**
     * @return DataInterface[]
     */
    public function getSupportClass(): array
    {
        return $this->supportClass;
    }

    /**
     * {@inheritdoc}
     */
    public function addSupport(DataSupportInterface $supportCass)
    {
        $this->supportClass[] = $supportCass;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
	public function resolve( $data)
	{
        foreach ($this->supportClass as $supportCass) {
            if($supportCass->support($data))
                return $supportCass->create($data);
        }

        throw new InvalidArgumentException(sprintf('Could not resolve the data object "%s"', @get_class ($data)));
    }
}