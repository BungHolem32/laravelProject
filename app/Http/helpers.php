<?php

/*ADD ARRAY KEYS IN SPECIFIC POSITION*/
if (!function_exists('AddArrayKeysInSpecificPosition')){
    function AddArrayKeysInSpecificPosition($array, $values, $offset)
    {
        if (!empty($array) && !empty($values) && !empty($offset))
            return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, NULL, true);
    }
}

/*GET URL FOR LAST SLUG*/
if (!function_exists('getUrlLastSlug')){
    function getUrlLastSlug($siteUrl)
    {
        $slug = strstr($siteUrl, '/');
        $slug = str_replace('/', '', $slug);
        return $slug;
    }
}

/*INPUT VALIDATION*/
if (!function_exists('validateInput')){
    function validateInput($input)
    {
        $cleanInput = null;
        $cleanInput = filter_var($input, FILTER_SANITIZE_STRING);
        return $cleanInput;
    }
}

/*DYNAMIC QUERY BUILDER INSERTION*/
if (function_exists('insetDynamicTable')){
    
    function createDynamicQuery($table = null)
    {
        if ($table){
            $validTable = validateInput($table);
            $queryUserStatement = "INSERT INTO $validTable VALUES ('',";
        }

        $queryUserStatement = "INSERT INTO `laravelcrmuser` VALUES ('',";
        
        foreach ($this->userInfo as $name => $val){
            if ($name == 'uId'){
                continue;
            } elseif ($name == 'password'){
                $queryUserStatement .= "'" . $val . "'" . ')';
            } else{
                $queryUserStatement .= "'" . $val . "'" . ',';
            }
        }
        return $queryUserStatement;
    }
}