<?php
    require('../mysql_connect.php');
    require_once(__DIR__ . '/vendor/autoload.php');
    require_once('google_key.php');
    session_start();

    $client = new Google_Client();

    //for local testing
    $guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
    $client->setHttpClient($guzzleClient);
    //

    $token = $_POST['token'];
    $username = $_POST['first_name'] . $_POST['last_name'];
    $email = $_POST['email'];

    $payload = $client->verifyIdToken($token);
    if ($payload) {
        $userid = $payload['sub'];
        // If request specified a G Suite domain:
        //$domain = $payload['hd'];
        //print_r($userid);
        $find_user = "
            SELECT * FROM `users`
            WHERE `provider_id` = '$userid'
        ";
        $create_user = "
            INSERT INTO `users`
            SET
            `provider_name` = 'google',
            `provider_id` = '$userid',
            `user_name` = '$username',
            `email` = '$email'
            ";

        $query = $find_user;
        $result = mysqli_query($conn, $query);

        if($result) {
            if (mysqli_num_rows($result)) {
                $output = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $output[] = $row;
                }
                echo json_encode($output);
            }
            else {
                $query = $create_user;
                $result = mysqli_query($conn, $query);

                if (mysqli_affected_rows($conn)) {      // Get project_id of newly inserted project = $id
                    $id = mysqli_insert_id($conn);
                    print("User ID: " . $id . "\n");
                } else {
                    print("\n Failure \n");
                }
            }
        }
    } else {
        echo "Invalid ID token";
    }
?>