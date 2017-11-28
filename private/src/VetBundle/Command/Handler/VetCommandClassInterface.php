<?php
namespace VetBundle\Command\Handler;


interface VetCommandClassInterface
{
    public function addContent($content, $field, $fieldType, $lastLvl);

    public function liaison($content);

    public function end($content);

    public function startContent($name);

    public function endContent($name);

}