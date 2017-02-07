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
    <title>Document</title>
</head>
<body>
Click to activate premium features
<form action="featured_charge.php" method="POST">
    <!-- data-key is the publishable key given by stripe -->
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="<?php echo $stripe['publishable_key']; ?>"
        data-email="<?php echo $user['email']; ?>"
        data-amount="1000"
        data-currency="usd"
        data-name="MacDIYver"
        data-description="Featured Project Status"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto">
    </script>
    <input placeholder="pid" type="text" name="pid" value="<?php echo $_GET['pid']; ?>">
</form>

TEST VISA:
4242 4242 4242 4242
01 / 20
123
</body>
</html>
