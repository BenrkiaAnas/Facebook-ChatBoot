<?php

require_once("./include/db.php");

function getResponse($post_id)
{
    $image = '<img src="https://spyzie.club/app/facebook/image/spyzie.jpg" />';
    $response = array(
        array(
            "id"=> 1,
            "id_post"=> "116300146423467_118189982901150",
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Best Football Team Ever And The Image ".$image,
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""
        ),
        array(
            "id"=> 2,
            "id_post"=> "116300146423467_118156959571119",
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Sport Now",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
        array(
            "id"=> 3,
            "id_post"=> "116300146423467_116461503073998",
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Welcome to our page",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
        array(
            "id"=> 4,
            "id_post"=> "116300146423467_116314399755375",
            "response_objet"=> "",
            "response_message"=>   "Hey, You Can Write Anything You Want ",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
        array(
            "id"=> 5,
            "id_post"=> "116300146423467_116304996422982",
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Background",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
        array(
            "id"=> 6,
            "id_post"=> "116300146423467_116303076423174",
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Background",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
        array(
            "id"=> 7,
            "id_post"=> "116300146423467_116302856423196",
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Profile",
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""

        ),
    );
   // $response_object = json_encode($response);
    $reply = null;
    for($i = 0 ; $i < count($response) ; $i++)
    {

        if($response[$i]["id_post"] == $post_id)
        {
            $reply = $response[$i];
            break;
        }


    }

    return $reply;
}
function defineTypeResponse($type)
{
    global $connection;
    $query = "SELECT * From attachement WHERE type = '$type'";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }
    return $query_con;
}

function getResponseImage($post,$type)
{
    global $connection;
    // Get Response For Image Type
    $response_type = mysqli_fetch_array(defineTypeResponse($type));
    $type_response  = $response_type["type"];
    $response_id = $response_type["response_id"];
    $payload_id = $response_type["payload_id"];
    $attachment_id = $response_type["attachement_id"];
    // Getting recepient Id
    $query = "SELECT * FROM response WHERE id = '$response_id'";
    $query_con = mysqli_query($connection,$query);
    if(!$query_con)
    {
        die("Query Failed ".mysqli_error($connection));
    }
    $result_response = mysqli_fetch_array($query_con);
    $recepient_id = $result_response["recipient_id"];

    if($response_type["type"] == 'image')
    {

        // Payload url
        $query2 ="SELECT * FROM payload WHERE attachment_id = '$attachment_id'";
        $query_con2 = mysqli_query($connection,$query2);
        if(!$query_con2)
        {
            die("Query Failed ".mysqli_error($connection));
        }

        $result_attachement = mysqli_fetch_array($query_con2);
        $url = $result_attachement["url"];
        $is_reusable = $result_attachement["is_reusable"];

        // Sending Response
        $jsonData_image = "{
        'recipient': {
            'id': $recepient_id
        },
        'message': {
            'attachment': {
                'type' : $type_response,
                'payload': {
                     'url': $url,
                     'is_reusable': $is_reusable
                }
            }
        }
       }";
        $response = array(
            "id"=> $response_id,
            "id_post"=> $post,
            "response_objet"=> "",
            "response_message"=> $jsonData_image ,
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""
        );
    }elseif ($response_type["type"] == 'text')
    {
        // Sending Response
        $jsonData_image = "{
        'recipient': {
            'id': $recepient_id
        },
        'message': {
            'attachment': {
                'text' : 'hello',
            }
        }
       }";

        $response = array(
            "id"=> $response_id,
            "id_post"=> $post,
            "response_objet"=> "",
            "response_message"=> $jsonData_image ,
            "attachement" => array(
                "title" => "title",
                "url" => "",
                "type" => "",
                "payload" => "null"
            ),
            "response_url"=>   ""
        );
    }

    return $response;

}
