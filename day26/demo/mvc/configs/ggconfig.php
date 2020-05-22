<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once 'assets/loginGG/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('55604331806-evqf9mlje1gntqd4i1esp8pnehgdhved.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('Qn2bI5PIxuavaws1QJ5o5-Zu');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/test/mvc/index.php?action=callback_gg');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page

?>