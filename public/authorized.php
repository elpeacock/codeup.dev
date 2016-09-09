<?php

    session_start();                               //picks up open session or starts a new one if there is no open session

    if (!isset($_SESSION['loggedInUser'])) {       //checks to see if the user is logged in
        header('location: /login_form.php');       //if not logged in, redirect to login_fomr
        die;                                       //murder php after redirect
    } else {
        echo "{$_SESSION['loggedInUser']}";        //if logged in display username on welcome
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Authorized</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700" rel="stylesheet">
    <style type="text/css">
        body {
            font-family:'Philosopher', sans-serif;
            background-image: url(/img/brightsquiggly.jpg);
            background-size: cover;
        }

        .container {
            text-align: center;
        }

        .holdTheHeaders {
            background-color: #C70039;
            padding-bottom: 30px;
            padding-top: 30px;
            margin-top: 50px;
            border-radius: 15px;
            width: 450px;
            text-align: center;
            box-shadow: 0px 0px 120px honeydew, 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="holdTheHeaders">
            <h1>Proceed <?= ($_SESSION['loggedInUser']) ?> ....</h1>
            <h2>You have been authorized</h2>
        </div>
        <button>Log Me Out!</button>

    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>