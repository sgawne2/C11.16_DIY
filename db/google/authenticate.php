<?php
    require_once(__DIR__ . '/vendor/autoload.php');
    require_once('google_key.php');
    session_start();

    $client = new Google_Client();

//for local testing
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);
//

    $token = $_POST['token'];

    $payload = $client->verifyIdToken($token);
    if ($payload) {
        $userid = $payload['sub'];
        // If request specified a G Suite domain:
        //$domain = $payload['hd'];
        print_r($userid);
    } else {
        echo "Invalid ID token";
    }
?>