<?php

//set connex params for parks db
const DB_HOST = '127.0.0.1';
const DB_NAME = 'parks_db';
const DB_USER = 'parks_user';
const DB_PASS = 'parks';

//req db_connect
require_once '../db_connect.php';
//req Input class
require_once __DIR__ . '/../Input.php';

//echo connection status
// echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

//wrap parks in page controller
function pageController ($dbc) {
    
    //pagination
    $data = array();
    // what page are we on? 
    if (!empty($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    if (isset($_GET['limit'])) {
        $limit = (int)strip_tags(htmlspecialchars(trim($_GET['limit'])));  
    } else {
        $limit = 4;
    }
    //offset maths
    $offset = ($currentPage - 1) * $limit;

    function getParks ($dbc, $limit, $offset) {
    //pull the parks from database
        $stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limit OFFSET :offset;');
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $allTheRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $allTheRows;
    }

    $parks = getParks($dbc, $limit, $offset);
    //total number of rows (national parks)
    $data['total'] = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();
    $data['parks'] = $parks;
    $data['currentPage'] = $currentPage;
    $data['limit'] = $limit;
    return $data;
}

extract(pageController($dbc));

//pull the post information from form
if (Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('park_description')) {

    //prepare statement to input info from post
    $insert = $dbc->prepare("INSERT INTO national_parks (name, location, date_established, area_in_acres, park_description) VALUES (:name, :location, :date_established, :area_in_acres, :park_description);");
    
    //insert values into database after stripping tags/special chars etc
    $insert->bindValue(':name', Input::getString('name'), PDO::PARAM_STR);
    $insert->bindValue(':location', Input::getString('location'), PDO::PARAM_STR);
    $insert->bindValue(':date_established', date('Y-m-d', strtotime(Input::getString('date_established'))), PDO::PARAM_STR);
    $insert->bindValue(':area_in_acres', Input::getNumber('area_in_acres'), PDO::PARAM_STR);
    $insert->bindValue(':park_description', Input::getString('park_description'), PDO::PARAM_STR);

    $insert->execute();
            

    
}





?>

<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Asul:400,700" rel="stylesheet">
    <style type="text/css">
        body {
            background-image: url('img/GrandPrismatic.jpeg');
            background-size: cover;
            font-family: 'Asul', sans-serif;
        }
        
        a {
            color: #09643F;
        }

        h1 {
            font-size: 3.5em;
        }

        button {
            background-color: rgba(9, 100, 63, 0.7);
        }

        .container {
            background-color: rgba(214, 114, 71, 0.75);
            margin-top: 60px;
            border-radius: 15px;

        }

        .search {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .form-header {
            text-align: center;
        }

        .form {
            margin-bottom: 75px;
        }

        #pages {
            text-align: center; 
        }

        #date {
            text-align: center;
        }

        #description {
            text-align: left;
        }

        #description-head {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h1>National Parks</h1>         
                <table class="table table-responsive">
                    <thead class='thead'> 
                        <th><h3>Name</h3></th>
                        <th><h3>Location</h3></th>
                        <th id="date"><h3>Date Established</h3></th>
                        <th id="area"><h3>Area In Acres</h3></th>
                        <th id="description-head"><h3>Park Description</h3></th>
                    </thead>
                    <tbody>   
                    <?php foreach ($parks as $index => $park) : ?>
                        <tr>
                            <td><?= strip_tags(htmlspecialchars(trim($park['name']))) ?></td>
                            <td><?= strip_tags(htmlspecialchars(trim($park['location']))) ?></td>
                            <td id="date"><?= strip_tags(htmlspecialchars(trim($park['date_established']))) ?></td>
                            <td id="area"><?= strip_tags(htmlspecialchars(trim(number_format($park['area_in_acres'])))) ?></td>
                            <td id="description"><?= strip_tags(htmlspecialchars(trim($park['park_description']))) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
        <div id="pages">
        <h3>
            <?php
            //pagination
            if ($currentPage > 1)
            {
                echo "<a href='?page=" . ($currentPage - 1) . " '>Previous  </a> ";
            }
            for ($i = 1; $i <= ($total/$limit); $i += 1)
                if ($i == $currentPage)
                {
                    echo $i;
                } else {
                    echo "<a href='?page=" . ($i) . " '>" . " " . $i . " " . "</a>";
                }
                if ($currentPage < ($total/$limit))
                {
                    echo "<a href='?page=" . ($currentPage + 1) . " '>  Next</a> ";
                } 
                ?>
        </h3>
        </div>
    </div>
    <div class="container search">
        <form class="form-group" method="GET" action="/national_parks.php">
            <label for="input" class="col-xs-2 col-form-label">Number of Parks Per page<input class="form-control" type="number" min="0" placeholder="Parks Per Page" name="limit"></label>
            <!-- <label for="select" class="col-xs-2 col-form-label">Sort Parks<select class="custom-select" type="text" placeholder="Parks Per Page" name="sort"> -->
            <!-- <option selected>Sort By Name</option>
            <option>Sort By Location</option>
            <option>Sort By Size</option>
            <option>Sort By Date Established</option>
            </select>

            </label> -->
            <button type="submit" class="btn">Get Parks</button>
        </form>
    </div>
        <div class="container form">
            <form class="form-group" method="POST" action="/national_parks.php">
                <h1 class="form-header">Add a Park</h1>
                <br>
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-xs-2 col-form-label">Park Name</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" placeholder="Park Name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-xs-2 col-form-label">Location</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="text" placeholder="Park Location (State)" name="location">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-xs-2 col-form-label">Date Established</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="date" placeholder="YYYY-mm-dd" name="date_established">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-xs-2 col-form-label">Area of Park</label>
                    <div class="col-xs-10">
                        <input class="form-control" type="number" placeholder="Park Acreage" name="area_in_acres">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-xs-2 col-form-label">Park Description</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" type="textarea" placeholder="Describe the Park" name="park_description"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg center-block">Submit</button>
            </form>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    </html>