<?php

/*ADD ARRAY KEYS IN SPECIFIC POSITION*/
if (!function_exists('AddArrayKeysInSpecificPosition')) {
    function AddArrayKeysInSpecificPosition($array, $values, $offset)
    {
        if (!empty($array) && !empty($values) && !empty($offset))
            return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, NULL, true);
    }
}

/*GET URL FOR LAST SLUG*/
if (!function_exists('getUrlLastSlug')) {
    function getUrlLastSlug($siteUrl)
    {
        $slug = strstr($siteUrl, '/');
        $slug = str_replace('/', '', $slug);
        return $slug;
    }
}

/*INPUT VALIDATION*/
if (!function_exists('validateInput')) {
    function validateInput($input)
    {
        $cleanInput = null;
        $cleanInput = filter_var($input, FILTER_SANITIZE_STRING);
        return $cleanInput;
    }
}

/*DYNAMIC QUERY BUILDER INSERTION*/
if (!function_exists('createDynamicQuery')) {

    function createDynamicQuery($table = null,$userInfo)
    {

        if ($table) {

            $validTable = validateInput($table);
            $queryUserStatement = "INSERT INTO $validTable VALUES ('',";
        }
        $queryUserStatement = "INSERT INTO `laravelCMSUser` VALUES ('',";

        foreach ($userInfo as $name => $val) {
            if ($name == 'uId') {
                continue;
            } elseif ($name == 'password') {
                $queryUserStatement .= "'" . $val . "'" . ')';
            } else {
                $queryUserStatement .= "'" . $val . "'" . ',';
            }
        }
        return $queryUserStatement;
    }
}

/*CREATE RANDOM TOKEN*/
if (!function_exists('createSaltPass')) {
    function createSaltPass($email)
    {
        $salt = null;
        $salt = $email . '*' . date("m.d.y");
        return $salt;
    }
}

if (!function_exists('createEncryptEncode')) {
    function createEncryptUserInfo($userInfo)
    {
        $encode = null;
        $pass = 'myOwnToken';
        $method = 'aes128';
        $iv = "1234567812345678";

        $encode = openssl_encrypt($userInfo, $method, $pass, true, $iv);


        $urlEncode = urlencode($encode);
        return $urlEncode;
    }
}


if (!function_exists('getDecryptUserInfo')) {
    function getDecryptUserInfo($encryptedData)
    {

        $decode = null;
        $pass = 'myOwnToken';
        $method = 'aes128';
        $iv = "1234567812345678";
        $decode = openssl_decrypt($encryptedData, $method, $pass, true, $iv);
        return $decode;
    }
}


/*ENCRYPT BASE 64*/
if (!function_exists('EncryptBase64')) {
    function EncryptBase64($string)
    {
        $isEncoded = null;
        $isEncoded = base64_encode($string);
        return $isEncoded;
    }
}

/*DECRYPT  BASE 64*/
if (!function_exists('DecryptBase64')) {
    function DecryptBase64($string)
    {
        $isDecrypted = null;
        $isDecrypted = base64_decode($string);
        return $isDecrypted;
    }
}

if (!function_exists('saltPassword')) {
    function saltPassword($password)
    {
        if (!empty($password)) {
            $password = sha1(md5($password . 'createSaltHash'));
        }
        return $password;
    }
}
