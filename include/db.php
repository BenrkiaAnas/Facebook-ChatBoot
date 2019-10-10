<?php
define("HOST","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DB","spyzie_back");


$connection = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if(!$connection)
{
    die("Query Failed ".mysqli_error($connection));
}

