<?php
require_once("../include/db.php");
require_once("../class/User.php");
require_once("../elements/getUsers.php");

// Testing Find AllUser()

$all_user = mysqli_fetch_assoc(findAllUsers());
print_r($all_user);

echo "<br>";
// Testing Find One User

$user_one = mysqli_fetch_assoc(findByUserId(2653333737333083));
print_r($user_one);

// Insert User
/*
$user = new User();
$user->__setUser_Id(2660444737789083);
$user->__setFirst_Name('Oussama');
$user->__setLast_Name('Khedar');

$create_user = insertUser($user);

*/
// Update User
/*
$user = new User();
$user->__setUser_Id(2653333737333083);
$user->__setFirst_Name('Oussama');
$user->__setLast_Name('Amzlaatb');

$create_user = updateUser($user);


*/

