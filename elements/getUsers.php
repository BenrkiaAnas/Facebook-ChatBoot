<?php
require_once("./class/User.php");

function getUsers($user_id,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$user_id?fields=first_name,last_name&access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response;
}
function getUsersPictureProfile($user,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$user/picture?width=100&height=100&redirect=false&access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response_pict = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response_pict;
}

function createUsers($user_data,$user_comment)
{
    $user = new User();
    $user->__setUser_Id($user_comment);
    $user->__setFirst_Name($user_data->first_name);
    $user->__setLast_Name($user_data->last_name);
    //$user->__setPicture($picture);

    return $user;
}
