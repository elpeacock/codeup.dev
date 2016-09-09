<?php
    session_start();

    $message = 'Enter your login info';

    if (!empty($_GET) || !empty($_POST)) {

        if (($_POST['username'] === 'guest') && ($_POST['password'] === 'password')) {
            $_SESSION['sessionId'] = session_id();                                  //assigning session id
            $_SESSION['loggedInUser'] = $_POST['username'];                         //assigning username to session
            if (isset($_SESSION['loggedInUser'])) {                                 //checking if user is logged in
                header('location: /authorized.php');                                //logged in user = redirect to authpg
                die;
            }
        } else {
            echo $message = "Login failed. Try again";                                   //not logged in = login now
        }
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Philosopher', sans-serif;
            background-image: url(/img/brightsquiggly.jpg);
            background-size: cover;
        }

        form {
            text-align: center;
            background-color: #C70039;
            padding-bottom: 40px;
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0px 0px 120px honeydew;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="col-md-4" method="POST" action="/login_form.php">
            <h1><?= $message ?></h1>
            <p>
            <label>Username
                <input class="form-control" id="username" name="username" type="text" placeholder="Username goes here">
            </label>
            </p>
            
            <p>
            <label>Password
                <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password">
            </label>
            </p>
            
            <button class="btn btn-secondary"type="submit">Log In!</button>
        </form>
        <p></p>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>