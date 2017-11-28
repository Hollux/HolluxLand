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

use Symfony\Component\Form\FormView;

class ListView
{         
    /**
     * @var string
     */  
    public $name;
    
    /**
     * @var array
     */	
    public $vars = [];
    
    /**
     * @var ListView[]
     */
    public $children = [];
   
    /**
     * @var FormView
     */
    public $form = null;

	/**
     * {@inheritdoc}
     */    
    public function getTags()
    {
        $tags = [];
        
        // Children tags
        foreach($this->children as $name => $element) {
            $tags = array_merge($tags, array_diff($element->getTags(), $tags));
        }
        
        // element tags
        if(isset($this->vars['tags']))
            $tags = array_merge($tags, $this->vars['tags']);
        
        return $tags;
    }

    /**
     * Return a array of ListHelperView filtered by tag
     *
     * @param string $tagName name of a tag
     *
     * @return ListHelperView[]
     */	
    public function getChildrenByTag($tagName)
    {
        $children = [];
        
        
        // Get Children
        if(count($this->children)) {
            foreach($this->children as $name => $element) {
                foreach($element->getChildrenByTag($tagName) as $child) {
                    $children[] = $child;
                }
            }
        } else {
            // Or get current object
            if(in_array($tagName, $this->getTags())) {
                $children[] = $this;
            }
        }
        
        return $children;
    }
    
    /**
     * Return true or false if has tag
     *
     * @param string $tagName name of a tag
     *
     * @return bool
     */	
    public function hasTag($tagName)
    {
        return count($this->getChildrenByTag($tagName)) >0;
    }  
}