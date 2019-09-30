<?php


function getResponse($post_id)
{
    $response = array(
        array(
            "id"=> 1,
            "id_post"=> "116300146423467_118189982901150",
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Best Football Team Ever",
            "response_url"=>   ""
        ),
        array(
            "id"=> 2,
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Sport Now",
            "response_url"=>   "",
            "id_post"=> "116300146423467_118156959571119"
        ),
        array(
            "id"=> 3,
            "response_objet"=> "",
            "response_message"=>   "Hey, You Choose Welcome to our page",
            "response_url"=>   "",
            "id_post"=> "116300146423467_116461503073998"
        ),
        array(
            "id"=> 4,
            "response_objet"=> "",
            "response_message"=>   "Hey, You Can Write Anything You Want ",
            "response_url"=>   "",
            "id_post"=> "116300146423467_116314399755375"
        ),
        array(
            "id"=> 5,
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Background",
            "response_url"=>   "",
            "id_post"=> "116300146423467_116304996422982"
        ),
        array(
            "id"=> 6,
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Background",
            "response_url"=>   "",
            "id_post"=> "116300146423467_116303076423174"
        ),
        array(
            "id"=> 7,
            "response_objet"=> "",
            "response_message"=>   "Hey , We Change Our Picture Profile",
            "response_url"=>   "",
            "id_post"=> "116300146423467_116302856423196"
        ),
    );
    $response_object = json_encode($response);
    foreach ($response_object as $key => $value)
    {
        if($value->id_post == $post_id)
        {
            $reply = $value;
        }
    }
    return $reply;
}
