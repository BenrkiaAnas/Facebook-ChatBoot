<?php
/*
// parameters
$hubVerifyToken = 'Spyzie Mega';
$accessToken =   "EAAJprzYt3yMBAMHX1YjSdWEfSyyHbZB4e3694YgcRPs6Kbpdl4IgiwRMRroZBLni2RRYz7dnkZBKZBQZA5DcvCbNZBnZBLuig1eKKez9J74bBjaP8j9isQDpT56q2SZCfKCi1PWtEEBvMAod9LUdxmjjAsZAdWTYmPhZBwnTqOEVoG4VL2UpmxsWeZBDzlszZAthOmsZD";

// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
    echo $_REQUEST['hub_challenge'];
    exit;
}

// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);

$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$response = null;

//set Message
if($messageText == "hi") {
    $answer = "Hello";
}



//send message to facebook bot
$response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => [ 'text' => $answer ]
];

$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
if(!empty($input)){
    $result = curl_exec($ch);
}
curl_close($ch);

*/
require_once("class/Comment.php");
require_once("class/Post.php");
require_once("class/User.php");
require_once("elements/getComment.php");
require_once("elements/getPost.php");
require_once("elements/getUsers.php");
require_once("elements/getResponse.php");
require_once("elements/getResponseType.php");
require_once("pages/autopost.php");


// Global Parameters
$app_secret = "dd9bca9e5139f81928972968dbcf5fb3";
$app_public = "312024849629673";
$accessToken = "EAAEbyPJSwekBAB6Gx7DhZBNnm7FVUclJkaCCk0CZCSWHaKCnIUi9DpnQz17ixC50WrlixWqu35wCIPZBvr79A5KzGVViAjoKybtzIZBmTFOAK7oZAl007Aosbeb6lq49h4mvzaRfXZCotgQ46xNuR5tbJZCTyUQPxGZAJ5kPNaPb8ebw8Jdi7ZBJIlvwHGchEZB3YZD";


if (isset($_GET['hub_mode']) && isset($_GET['hub_challenge']) && isset($_GET['hub_verify_token'])) {
    if ($_GET['hub_verify_token'] == 'Sport Now')
        echo $_GET['hub_challenge'];

}else {
    global $user;
    $feedData = file_get_contents('php://input');
    $data = json_decode($feedData);
    $handle = fopen("test.txt",'w');
    fwrite($handle,$feedData);
    fclose($handle);
    if ($data->object == "page")
    {
        // Getting all the post of the page
        $token = 'Sport Now';
        $idPage = $data->entry[0]->id;
        $post_id = $data->entry[0]->changes[0]->value->post_id; // Getting The Post Id
        $user_id = $data->entry[0]->changes[0]->value->from->id; // Getting The User Id


        // Get Post Object Data
        $post_data_all = getPosts($post_id,$accessToken);
        // Create a Post Object
        $post = createPost($post_data_all,$post_id);
        $post_data = "POST Id : {$post->__getPost_Id()} and Date Created is {$post->__getPost_Created()} ";
        $handle_data_post = fopen("post.txt",'w');
        fwrite($handle_data_post,$post_data);
        fclose($handle_data_post);

        // SAVE Post In Database
        $post_saved = insertPost($post);



        // Get Comment object  by comment_id
        $commentID = $data->entry[0]->changes[0]->value->comment_id; // Getting comment_id
        $data_comment = getComments($commentID,$accessToken);
        //$comment_attachement = $data_comment->attachment;
        // Create a Comment Object
        $comment = createComment($data_comment,$post_id);

        $comment_data = "User_id : {$comment->__getUser_Id()} and Comment_id : {$comment->__getCommentaire_Id()} and Date Created : {$comment->__getCommentaire_Created()} and  Post_Id : {$comment->__getPost_Id()}";
        $handle_data_comment = fopen("comment.txt",'w');
        fwrite($handle_data_comment,$comment_data);
        fclose($handle_data_comment);

        // Insert Comment In Database
        $comment_inserted = insertComment($comment);



        // Get User Object Data
        $user_data = getUsers($user_id,$accessToken);
        // Get User Picture Profile Object Data
        $user_picture = getUsersPictureProfile($comment->__getUser_Id(),$accessToken);
        $user = createUsers($user_data,$user_id);

        $user_data_all = "User_id : {$user->__getUser_Id()} and First_name : {$user->__getFirst_Name()} and Last_name : {$user->__getLast_Name()} and  user_picture : {$user->__getPicture()}";
        $handle_data_post = fopen("user.txt",'w');
        fwrite($handle_data_post,$user_data_all);
        fclose($handle_data_post);


        // Insert User In Database
        $user_inserted = insertUser($user);



        // response to user
        // get reply from post (database)
        $reply = getResponse($post_id);

        $message_reply = "An Error Sending Message ";
        if($reply!=null)
        {
            $message_reply = $reply["response_message"];
        }




        // Sending Image
        /* $url = "https://graph.facebook.com/v4.0/me/messages?access_token=$accessToken";
         $reply = getResponseType($post_id,$comment->__getUser_Id());
         $data_file = $reply["response_message"];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_file);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v4.0/$commentID/private_replies");
        curl_exec($ch);
        curl_close($ch);*/

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=$message_reply&access_token=$accessToken");
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v4.0/$commentID/private_replies");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:64.0) Gecko/20100101 Firefox/64.0");
        $response = curl_exec($ch);
        curl_close($ch);
    }

}
http_response_code(200);

// Submitting The Post To The Facebook

/*if(isset($_POST["post_facebook"]))
{
    // Posting On Facebook Page
    postFacebook($app_public,$app_secret,$accessToken,$_POST["textPost"]);

}*/
