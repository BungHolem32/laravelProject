<?php

if (!function_exists('AddArrayKeysInSpecificPosition')){
    function AddArrayKeysInSpecificPosition($array, $values, $offset)
    {
        return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, NULL, true);
    }
}
