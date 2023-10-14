<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <title>Login with PayPal - Demo App</title>

    <style type="text/css">
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Login with PayPal - Demo App</h1>
    <p>Welcome! No boring signup here. Just use the following button to login.</p>

    <hr />
    <span id='paypalButton'></span>
    <script src='https://www.paypalobjects.com/js/external/api.js'></script>
    <script>
        paypal.use(['login'], function(login) {
            login.render({
                "appid": '<?php echo $_ENV['CLIENT_ID']?>',
                "authend": "sandbox",
                "scopes": "openid profile email address",
                "containerid": "paypalButton",
                "responseType": "code",
                "locale": "en-us",
                "buttonType": "LWP",
                "buttonShape": "rectangle",
                "buttonSize": "lg",
                "fullPage": "true",
                "returnurl": "<?php echo $_ENV['RETURN_URL']?>"
            });
        });
    </script>

</body>

</html>