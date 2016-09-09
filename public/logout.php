<?php
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
</head>
<body>
    <div class="container">
        <h1>Peace out girl scout</h1>
    </div>
</body>
</html>