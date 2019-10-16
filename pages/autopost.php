<?php
require_once("facebookApp/vendor/autoload.php");

function postFacebook($app_id,$app_secret,$accessToken,$message)
{
    $fb = new Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => 'v2.3',
    ]);

    $pageAceessToken = $accessToken;

    // Post Message On Facebook

    $msgData = [
        "message" => $message
    ];

    try
    {
        $respose = $fb->post('me/feed',$msgData,$pageAceessToken);
    }catch (Facebook\Exceptions\FacebookResponseException $e)
    {
        echo "Graph return an error ".$e->getMessage();
        exit;
    }
    catch (Facebook\Exceptions\FacebookSDKException $exp)
    {
        echo "Facebook SDK return an error ".$exp->getMessage();
    }

    $graphMode = $respose->getGraphNode();
    return "ID :".$graphMode['id'];


}
