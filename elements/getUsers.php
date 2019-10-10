<?php
//require_once("./class/User.php");
//require_once("./include/db.php");


function getUsers($user_id,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$user_id?fields=first_name,last_name&access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response;
}
function getUsersPictureProfile($user,$accessToken)
{
    $url = "https://graph.facebook.com/v4.0/$user/picture?width=100&height=100&redirect=false&access_token=$accessToken";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response_pict = json_decode(curl_exec($ch));
    curl_close($ch);

    return $response_pict;
}

function createUsers($user_data,$user_comment)
{
    $user = new User();
    $user->__setUser_Id($user_comment);
    $user->__setFirst_Name($user_data->first_name);
    $user->__setLast_Name($user_data->last_name);
    //$user->__setPicture($picture);

    return $user;
}
function findAllUsers()
{
    global $connection;
    $query = "SELECT * FROM users";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}
function findByUserId($id)
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id = $id ";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }else{
        return $query_con;
    }
}
function insertUser($user)
{
    global $connection;
    // Insert Into Database
    // Inserting Only Users Not Existing In Database
    $user_query = findByUserId($user->__getUser_Id());
    $count = mysqli_num_rows($user_query);
    if($count == 0)
    {
        $query2 = "INSERT INTO users (user_id,first_name,last_name) VALUES('{$user->__getUser_Id()}','{$user->__getFirst_Name()}','{$user->__getLast_Name()}')";
        $query_con2 = mysqli_query($connection,$query2);
        if(!$query_con2)
        {
            die("Query Failed ".mysqli_error($connection));
        }else{
            echo "Users Created Successfully";
        }
    }
}

function updateUser($user)
{
    global $connection;
    // Check If The User Exist In Database
    $user_query = findByUserId($user->__getUser_Id());
    $count = mysqli_num_rows($user_query);
    if($count > 0)
    {
        $user_first_name = $user->__getFirst_Name();
        $user_last_name = $user->__getLast_Name();
        $query2 = "UPDATE users SET first_name = '{$user_first_name}',last_name = '{$user_last_name}' WHERE user_id = '{$user->__getUser_Id()}'";
        $query_con2 = mysqli_query($connection,$query2);
        if(!$query_con2)
        {
            die("Query Failed ".mysqli_error($connection));
        }else{
            echo "User Updated Successfully";
        }
    }else{
        insertUser($user);
    }
}


