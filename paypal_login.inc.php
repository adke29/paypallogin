<?php
// helper package autoload.
require('vendor/autoload.php');

// setting some variables here.
$clientId = $_ENV['CLIENT_ID'];
$clientSecret = $_ENV['CLIENT_SECRET'];

// here we exchange the authorization code with access and refresh tokens.
$response = \Httpful\Request::post('https://api-m.sandbox.paypal.com/v1/oauth2/token')
    ->authenticateWith($clientId, $clientSecret)
    ->body('grant_type=' . "authorization_code" . '&code=' . $_GET['code'])
    ->send();
    
$jsonResponse = json_decode($response->raw_body);

// checking out for errors.
if (isset($jsonResponse->error)) {
    die('Error: get access token error. Try again.');
}


// getting user data, using the Identity APIs.
$response = \Httpful\Request::get('https://api-m.sandbox.paypal.com/v1/identity/openidconnect/userinfo?schema=openid')
    ->contentType("application/x-www-form-urlencoded")
    ->authorization("Bearer " . $jsonResponse->access_token)
    ->send();

// user data is here!
$user = json_decode($response->raw_body);
if (isset($user->error)) {
    die('Error: get user info error. Try again.');
}


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api-m.sandbox.paypal.com/v1/oauth2/token');
curl_setopt($curl, CURLOPT_POST, true);

?>