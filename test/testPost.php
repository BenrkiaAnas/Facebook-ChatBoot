<?php
//require_once("../include/db.php");
//require_once("../class/Post.php");
//require_once("../elements/getPost.php");

// Testing Find AllPost()

$all_post = mysqli_fetch_array(findAllPost());
print_r($all_post);


echo "<br>";

// Testing One Post


$post_one = mysqli_fetch_assoc(findByPostId('116300146423467_116461503073998'));
print_r($post_one);

/*
// Insert Post
$post = new Post();

$post->__setPost_Id('116300146423467_116304996422982');
$post->__setPost_Created('2019-09-17T10:42:48+0000');

$post_created =insertPost($post);
*/
