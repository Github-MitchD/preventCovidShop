<?php

class Securite
{
    /**
     * Function that allows to secure a character string
     *
     * @param $string
     * @return $string
     */
    public static function secureHTML($string)
    {
        // Remove spaces before and after a string
        $string = trim($string);
        // Remove backslashes from a string
        $string = stripslashes($string);

        return $string;
    }    
}