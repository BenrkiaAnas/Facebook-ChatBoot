<?php


function getResponseType($post_id,$user_id)
{



    $response = array(
        array(
            "id"=> 1,
            "id_post"=> "116300146423467_118189982901150",
            "response_objet"=> "",
            "response_message"=> $jsonData_image ,
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


