<?php

if (!function_exists('AddArrayKeysInSpecificPosition')){
    function AddArrayKeysInSpecificPosition($array, $values, $offset)
    {
        if(!empty($array) && !empty($values) && !empty($offset))
        return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, NULL, true);
    }
}

if (!function_exists('AddArrayKeysInSpecificPosition')){
    function getUrlLastSlug($siteUrl)
    {
        $slug = strstr($siteUrl,'/');
        $slug = str_replace('/','',$slug);
        return $slug;
    }
}

