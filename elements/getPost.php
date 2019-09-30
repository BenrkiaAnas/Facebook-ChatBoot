<?php
require_once("./class/Post.php");

function getPosts($post_id,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$post_id?access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response;
}

function createPost($post_data,$post_id)
{
    $post = new Post();
    $post->__setPost_Id($post_id);
    $post->__setPost_Created($post_data->created_time);

    return $post;
}

function addPost($id_page,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$id_page/posts?access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response_all = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response_all;
}
