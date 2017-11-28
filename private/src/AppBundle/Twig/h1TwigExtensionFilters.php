<?php
/**
 * Created by PhpStorm.
 * User: amarchan
 * Date: 13/01/2017
 * Time: 12:12
 */

namespace AppBundle\Twig;


class h1TwigExtensionFilters extends \Twig_Extension
{
    public function getFilters()
    {
        return ['h1only' => new \Twig_Filter_Method($this, 'h1only')];
    }

    public function h1only($var)
    {
        if(is_string($var) && strlen($var)) {
            $find = '/(?s)(?<=<h1>)(.+?)(?=<\/h1>)/';
            if(preg_match($find, $var, $result)) {
                $var = $result[0];
            }

        }

        return $var;
    }

    public function getName()
    {
        return 'h1 Only';
    }
}