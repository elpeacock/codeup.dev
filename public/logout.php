<?php
    
session_start();

function clearSession()
{
    // clear $_SESSION array
    session_unset();

    // delete session data on the server
    session_destroy();

    // ensure client is sent a new session cookie
    session_regenerate_id();

    // start a new session - session_destroy() ended our previous session so
    // if we want to store any new data in $_SESSION we must start a new one
    session_start();
}   
clearSession();
?>
<!DOCTYPE html>
<html>
<head>
    <title>logout</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Philosopher:400,700" rel="stylesheet">
    <style type="text/css">
        h1 {
            text-align: center;
        }

        body {
            font-family:'Philosopher', sans-serif;
            background-image: url(/img/brightsquiggly.jpg);
            background-size: cover;
            color: white;
        }

        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>You have been logged out. Peace out girl scout.</h1>
        <a href="/login_form.php">click here to log in again.</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>