<?php
session_start();
require_once('mysql_connect.php');
require_once('vendor/autoload.php');
require_once('stripe_keys.php');
//composer's auto loader

$_SESSION['user_id'] = 1;

$user_id = $_SESSION['user_id'];

\Stripe\Stripe::setApiKey($stripe['secret_key']);


$query = "
    SELECT `user_id`, `user_name`, `email`, `is_premium`
    FROM `users`
    WHERE `user_id` = $user_id
";

$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result) ) {
    $user = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $user[] = $row;
    }
//    echo json_encode($output);
    $user = $user[0];
//    print_r($user);
}
?>