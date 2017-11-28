<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace ListHelperBundle\Component\Data;

use ListHelperBundle\Component\DataInterface;
use ListHelperBundle\Component\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractData implements DataInterface
{ 
     /**
     * @var FilterInterface[]
     */
    private $filters = [];

    /**
     * Constructor.
     *
     * @param mixed   $data  A data to use
     */      
    public function __construct($data = null)
    {
        $this->setData($data);
        $this->setParametersChange();
    }
    
    /**
     * {@inheritdoc}
     */    
    public function addFilter($name, FilterInterface $filter)
    {
        $this->filters[$name] = $filter;
        
        $this->setParametersChange();
        
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */    
    public function getFilters()
    {
        return $this->filters;
    }  
    
    /**
     * Call when a parameter has changed
     */
    abstract protected function setParametersChange();    
}
