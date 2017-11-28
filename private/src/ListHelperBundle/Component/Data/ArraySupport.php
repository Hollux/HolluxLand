<?php
/**
 * Created by PhpStorm.
 * User: ddesousa
 * Date: 09/06/2017
 * Time: 16:52
 */

namespace ListHelperBundle\Component\Data;

use ListHelperBundle\Component\DataInterface;
use ListHelperBundle\Component\DataSupportInterface;
use ListHelperBundle\Component\Exception;

class ArraySupport implements DataSupportInterface
{
    /**
     * {@inheritdoc}
     */
    public function support($data) : bool
    {
        return is_array($data);
    }

    /**
     * {@inheritdoc}
     */
    public function create($data) : DataInterface
    {
        if(!$this->support($data))
            throw new InvalidArgumentException(sprintf('Could not resolve the data object "%s"', @get_class ($data)));

        return (new ArrayData())->setData($data);
    }
}