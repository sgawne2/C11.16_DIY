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
    $username = $_POST['first_name'];
    $email = $_POST['email'];
    $photo = $_POST['photo'];

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

        $update_user = "
            UPDATE `users`
            SET
            `name` = '$username',
            `email` = '$email',
            `user_photo` = '$photo'
            WHERE `provider_id` = '$userid'
            ";

        $create_user = "
            INSERT INTO `users`
            SET
            `provider_name` = 'google',
            `provider_id` = '$userid',
            `user_name` = '$username',
            `name` = '$username',
            `email` = '$email'
            `user_photo` = '$photo'
            ";

        $query = $find_user;
        $result = mysqli_query($conn, $query);

        if($result) { //select user row
            if (mysqli_num_rows($result)) {
                $output = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $output[] = $row;
                }
                echo json_encode($output);
                $id = $output[0]['user_id'];
                $name = $output[0]['name'];
                $premium = $output[0]['is_premium'];
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;

                $query = $update_user;
                $result = mysqli_query($conn, $query);
            }
            else { // insert new user
                $query = $create_user;
                $result = mysqli_query($conn, $query);

                if (mysqli_affected_rows($conn)) {      // Get project_id of newly inserted project = $id
                    $id = mysqli_insert_id($conn);
                    $name = $username;
                    $premium = 0;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $name;
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