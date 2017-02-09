<?php
require_once('init.php');

if ($user['is_premium']) {
//    header('Location: stripe_test.php');
//    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- include the jQuery library as we are using jQuery functions -VL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-route.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <title>Document</title>
</head>
<body>

<md-card style="max-height:none; width:40vw; margin: auto; position:relative; top:35%">
    <div style="background-color: #00BFA5; color:white; width:100%; text-align:center">
        <h2>Payment</h2>
    </div>

    <md-card-content>
        <h4>Click to pay $20.00 to have this project featured</h4>
        <form action="featured_charge.php" method="POST">
            <!-- data-key is the publishable key given by stripe -->
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $stripe['publishable_key']; ?>"
                data-email="<?php echo $user['email']; ?>"
                data-amount="2000"
                data-currency="usd"
                data-name="MacDIYver"
                data-description="Featured Project Status"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
            <input placeholder="pid" type="text" name="pid" value="<?php echo $_GET['pid']; ?>" style="display:none;">
        </form>
    </md-card-content>
</md-card>

<!--TEST VISA:-->
<!--4242 4242 4242 4242-->
<!--01 / 20-->
<!--123-->
</body>
</html>
