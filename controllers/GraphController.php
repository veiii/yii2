<?php

namespace app\controllers;

use yii\web\Controller;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use Microsoft\Dri;
//use GuzzleHttp\Client;

class GraphController extends Controller
{
    public $accessToken;

    public function login()
    {
        $tenantId='common';
        $guzzle = new \GuzzleHttp\Client();
        $url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0';
        $token = json_decode($guzzle->post($url, [
            'form_params' => [
                'client_id' => '5546b8b3-525a-43cc-a44a-c56d5671edf8',
                'client_secret' => 'kTdL8waA1uDhhXBmrE68dj2',
                'resource' => 'https://graph.microsoft.com/',
                'grant_type' => 'client_credentials',
            ],
        ])->getBody()->getContents());
        $this->accessToken = $token->access_token;
        echo'<pre>';
        print_r($token);
        echo'</pre>';
    }

    public function actionIndex()
    {
        $this->login();

        $graph = new Graph();
        $graph->setAccessToken($this->accessToken);
print_r($graph);
        //$graph->createRequest("GET", "/me/drive/items/165A81C7CB228886!105/content")
          //  ->download('C:/kawa.txt');





    }

}