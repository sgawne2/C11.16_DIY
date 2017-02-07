<?php
//    echo $_POST['stripeToken'];
require_once('init.php');
$pid = $_POST['pid'];
if ( isset($_POST['stripeToken']) ) {
    $token = $_POST['stripeToken'];

    try{
        \Stripe\Charge::create([
            "amount" => 1000,
            "currency" => "usd",
            "description" => "Example charge",
            "source" => $token
        ]);
        $query = "
        UPDATE `projects`
        SET `is_premium` = 1
        WHERE `project_id` = ". $pid
        ;
//        echo $_POST['pid'];
        mysqli_query($conn, $query);
        header('Location: ../../view_project.php?pid='. $pid);
        exit();
    }
    catch(\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];

        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
}
?>