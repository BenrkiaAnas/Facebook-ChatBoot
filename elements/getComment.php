<?php
require_once("./class/Comment.php");

function getComments($comment_id,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$comment_id?fields=id,from,created_time,attachment&access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response;
}

function createComment($comment_result,$post_id)
{
    $comment = new Comment();
    $comment->__setUser_Id($comment_result->from->id);
    $comment->__setPost_Id($post_id);
    $comment->__setCommentaire_Id($comment_result->id);
    $comment->__setCommentaire_Created($comment_result->created_time);

    return $comment;

}

