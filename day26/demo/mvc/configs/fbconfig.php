<?php
require_once "assets/src/Facebook/autoload.php";
$fb = new Facebook\Facebook([
    'app_id' => '617186075540158', // Replace {app-id} with your app id
    'app_secret' => '4ef7f2f9960182e4df7597848174c0f2',
    'default_graph_version' => 'v2.9',
]);
$helper = $fb->getRedirectLoginHelper();
