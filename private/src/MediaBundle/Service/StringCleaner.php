<?php
namespace MediaBundle\Service;


class StringCleaner
{
    public function urlCleaner($string)
    {
        // Clean  string
        $string = strtolower(htmlentities($string, ENT_QUOTES, 'utf-8'));
        $string = preg_replace('#\&(.)(?:uml|circ|tilde|acute|grave|cedil|ring)\;#', '\1', $string);
        $string = preg_replace('#\&(.{2})(?:lig)\;#', '\1', $string); // pour '&oelig;'...
        $string = preg_replace('#\&[a-z]+\;#', '', $string);
        $string = preg_replace('# #', "_", $string);

        return $string;
    }

}