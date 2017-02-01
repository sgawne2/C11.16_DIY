<?php
    require_once(__DIR__ . '/vendor/autoload.php');
    session_start();
    $api_key = "AIzaSyAvDDJwMrwMlgQGKvStEIUOJZhL-_596Mo";

    $client = new Google_Client();

//for local testing
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$client->setHttpClient($guzzleClient);
//


//    $token = "eyJhbGciOiJSUzI1NiIsImtpZCI6ImE2YzJjNmQ0ZTZkYTFmOWJjMTdmYzhkMzExMzNiOTJmMDdlOTgxMTkifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDg1OTA2MTUwLCJleHAiOjE0ODU5MDk3NTAsImF0X2hhc2giOiJPNmphRnNPS1JnR3YxU1Bmd051U05BIiwiYXVkIjoiOTEyNzA4NTE5NDAtNWxnYzgxZmdibmRhNDc4Z2I0MG44MG5xaTIwN3JucGUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMDgwNjg1ODk2ODgwNzcxMTY0OTQiLCJlbWFpbF92ZXJpZmllZCI6dHJ1ZSwiYXpwIjoiOTEyNzA4NTE5NDAtNWxnYzgxZmdibmRhNDc4Z2I0MG44MG5xaTIwN3JucGUuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJlbWFpbCI6InNnYXduZTJAZ21haWwuY29tIiwibmFtZSI6IlMuIEdhd25lIiwicGljdHVyZSI6Imh0dHBzOi8vbGg1Lmdvb2dsZXVzZXJjb250ZW50LmNvbS8tSHMwczVTLUdpNVUvQUFBQUFBQUFBQUkvQUFBQUFBQUFBQUEvQURQbGhmSUpHRTRUOFZDU1QzWXdNRDdIdUVNRDc2eVoyQS9zOTYtYy9waG90by5qcGciLCJnaXZlbl9uYW1lIjoiUy4iLCJmYW1pbHlfbmFtZSI6Ikdhd25lIn0.hCvHleFvpFl-S_LLYIPjovhn-SY0MqTTVEW0a9slX0VRTH9V1DT-HqqB-rwx4nIKwMHnSnR0h0jdqe0AwcexBg6oLWZ9Vwn4xOGL7YLf0gZkycsHWhqhxiaTEfLimiu0aE0o80vgs1D2Xv2kNArn79AdrEd9cQEifEFyaJS2DStnkavKRnbceCRKVfKQmCEc0qxUSBomvI7rsOfB1NdlsOv4xhiqlv2LQC4JuHbE29z004cHfGBv9x2mNprEOvyQmbJZxxrmsUeOXp-mcDUWpn-9mG0BEQIsYRgo9rYLZlojLYlssSfxx_Yv8YAXYQg0EPHVISuYt2BRA9HteFjJ4A";

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



//print_r($_POST);

?>