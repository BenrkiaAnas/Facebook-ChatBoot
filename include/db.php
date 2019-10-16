<?php
define("HOST","localhost");
define("USERNAME","spyzie_userpro");
define("PASSWORD","0102030405$");
define("DB","spyzie_dbprod");


$connection = mysqli_connect(HOST,USERNAME,PASSWORD,DB);

if(!$connection)
{
    die("Query Failed ".mysqli_error($connection));
}

