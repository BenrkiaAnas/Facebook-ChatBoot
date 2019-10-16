<?php
require_once("../include/db.php");
require_once("../class/Comment.php");
require_once("../elements/getComment.php");

// Testing Find AllUser()
/*
$all_comment = mysqli_fetch_assoc(findAllComment());
print_r($all_comment);
*/
echo "<br>";
// Testing Find One User

$comment_one = mysqli_fetch_assoc(findByCommentIdId('118189982901150_137052911014857 '));
print_r($comment_one);

// Insert Comment
/*
$comment = new Comment();
$comment->__setUser_Id('2653333737333083');
$comment->__setPost_Id('116300146423467_118189982901150');
$comment->__setCommentaire_Created('2019-10-08 13:34:49');
$comment->__setCommentaire_Id('118180000901150_133578651360000');

$create_comment = insertComment($comment);

*/
// Update User
/*
$user = new User();
$user->__setUser_Id(2660444737789083);
$user->__setFirst_Name('Oussama');
$user->__setLast_Name('Amzlaatb');

$create_user = updateUser($user);

*/
