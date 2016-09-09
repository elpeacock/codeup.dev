<?php

function pageController()
{
    $data = [];

    $data['value'] = isset($_GET['value']) ? $_GET['value'] : 0;

    return $data;
    
}
extract(pageController());


?>
<!DOCTYPE html>
<html>
<head>
    <title>Pong</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        body {
            background-image: url(/img/righttenniscourt.jpg);
            background-size: cover;
        }

        h1 {
            text-align: center;
        }

        h2 > a {
            color: midnightblue;
        }

        h2 {
            text-align: center;
            background-color: white;
            padding-top: 30px;
            padding-bottom: 30px;
            border-radius: 75%;

        }

        .col-md-6 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pong's turn!</h1>
        <h1>Volley count: <?= $value ?></h1>
        <h2 class="col-md-6"><a href="ping.php?value=<?= ($value + 1) ?>">hit</a></h2>
        <h2 class="col-md-6"><a href="ping.php?value=0">miss</a></h2>


    </div>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>