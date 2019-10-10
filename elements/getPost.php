<?php
//require_once("./class/Post.php");

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
function findAllPost()
{
    global $connection;
    $query = "SELECT * FROM post";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}

function findByPostId($id)
{
    global $connection;
    // Insert Into Database
    // Inserting Only Users Not Existing In Database
    $query = "SELECT * FROM post WHERE post_id = '{$id}' ";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}

function insertPost($post)
{
    global $connection;
    // Insert Into Database
    $comment_query = findByPostId($post->__getPost_Id());
    $count = mysqli_num_rows($comment_query);
    if($count == 0)
    {
        $query = "INSERT INTO post (post_id,created_time) VALUES('{$post->__getPost_Id()}','{$post->__getPost_Created()}') ";
        $query_con = mysqli_query($connection,$query);
        if(!$query_con)
        {
            die("Query Failed ".mysqli_error($connection));
        }else{
            echo "Post Created Successfully";
        }
    }
}
