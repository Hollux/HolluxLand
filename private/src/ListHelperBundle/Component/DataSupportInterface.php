<?php
/**
 * Created by PhpStorm.
 * User: ddesousa
 * Date: 09/06/2017
 * Time: 16:52
 */

namespace ListHelperBundle\Component;


interface DataSupportInterface
{
    /**
     * Set the data for this List data
     *
     * @param mixed   	    $data       the data to support
     *
     * @return bool         if this object support the data
     */
    public function support($data) : bool;

    /**
     * Set the data for this List data
     *
     * @param mixed   	        $data       the data to support
     *
     * @return DataInterface      if this object support the data, create DataInterface
     *
     * @throws Exception\InvalidArgumentException if the data can not be resolved
     */
    public function create($data) : DataInterface;
}