<?php
//require_once("../include/db.php");
//require_once("../elements/getResponse.php");

// Get Response Image

$type = 'image';
$type_image = defineTypeResponse($type);

$response = getResponseImage('116300146423467_116304996422982',$type);

print_r($response);
///////////////////////////
///
echo "<br>";
// Get Response Text


$type = 'text';
$type_image = defineTypeResponse($type);

$response = getResponseImage('116300146423467_116304996422982',$type);

print_r($response);
