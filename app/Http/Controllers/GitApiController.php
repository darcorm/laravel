<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class GitApiController extends Controller
{
    public static function fetchGitUserData()
    {
        $client = new Client();
        $data = $client->request('GET', 'https://api.github.com/users/yii2/starred');
        $gitUserData = json_decode($data->getBody());

        return $gitUserData;
    }
}
