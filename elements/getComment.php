<?php
require_once("./class/Comment.php");
require_once("./include/db.php");

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

function findAllComment()
{
    global $connection;
    $query = "SELECT * FROM comment";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}

function findByCommentIdId($id)
{
    global $connection;
    // Insert Into Database
    // Inserting Only Users Not Existing In Database
    $query = "SELECT * FROM comment WHERE comment_id = '{$id}' ";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}
function insertComment($comment)
{
    global $connection;
    // Insert Into Database
    $comment_query = findByCommentIdId($comment->__getCommentaire_Id());
    $count = mysqli_num_rows($comment_query);
    if($count == 0)
    {
        $query = "INSERT INTO comment (comment_id,user_id,post_id,created_time) VALUES('{$comment->__getCommentaire_Id()}','{$comment->__getUser_Id()}','{$comment->__getPost_Id()}','{$comment->__getCommentaire_Created()}') ";
        $query_con = mysqli_query($connection,$query);
        if(!$query_con)
        {
            die("Query Failed ".mysqli_error($connection));
        }else{
            echo "Comment Created Successfully";
        }
    }
}


