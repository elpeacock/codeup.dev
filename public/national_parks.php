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

    //allow the user to specify results per page
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

$errors = [];

// if form has been submitted
if (!empty($_POST)) {
    // try to pull the post information from form
    try {
        // if any input is empty throw an exception
        if (Input::has('name') && Input::has('location') && Input::has('date_established') && Input::has('area_in_acres') && Input::has('park_description') ) {
            // make variables and use getString and getNumber with try catch around each
            try {
                $addedName = strip_tags(htmlspecialchars(trim(Input::getString('name'))));
            } catch (outOfRangeException $e) {
                $errors['name'] = $e->getMessage();
                echo 'Name is required';
            } catch (invalidArgumentException $e) {
                $errors['name'] = $e->getMessage();
                echo 'enter a valid string';
            } catch (rangeException $e) {
                $errors['name'] = $e->getMessage();
                echo 'name length is too short or too long';
            }

            try {
                $addedLocation = strip_tags(htmlspecialchars(trim(Input::getString('location'))));
            } catch (outOfRangeException $e) {
                $errors['location'] = $e->getMessage();
                echo 'Location is required';
            } catch (invalidArgumentException $e) {
                $errors['location'] = $e->getMessage();
                echo 'enter a valid location';
            } catch (rangeException $e) {
                $errors['location'] = $e->getMessage();
                echo 'name length is too short or too long';
            }

            try {
                $addedDate = strip_tags(htmlspecialchars(trim(date('Y-m-d', strtotime(Input::getString('date_established'))))));
            } catch (exception $e) {
                $errors['date_established'] = $e->getMessage();
            }

            try {
                $addedSize = strip_tags(htmlspecialchars(trim(Input::getNumber('area_in_acres'))));
            } catch (outOfRangeException $e) {
                $errors['area_in_acres'] = $e->getMessage();
                echo 'size of park is required';
            } catch (invalidArgumentException $e) {
                $errors['area_in_acres'] = $e->getMessage();
                echo 'size of park must be a number';
            } catch (rangeException $e) {
                $errors['area_in_acres'] = $e->getMessage();
                echo 'park size is too small or too large';
            }

            try {
                $addedDescription = strip_tags(htmlspecialchars(trim(Input::getString('park_description'))));
            } catch (outOfRangeException $e) {
                $errors['park_description'] = $e->getMessage();
                echo 'description is required';
            } catch (invalidArgumentException $e) {
                $errors['park_description'] = $e->getMessage();
                echo 'enter a valid description';
            } catch (rangeException $e) {
                $errors['park_description'] = $e->getMessage();
                echo 'length of description is too short or too long';
            }
            
        } else {
            
            throw new Exception('Please fill out all input fields');

        }

    } catch (exception $e) {
        
        $errors[] = $e->getMessage();
    }
    
    // if errors is empty
    if (empty($errors)) {
        // do insert statement with bindvalues
        //prepare statement to input info from post
        $insert = $dbc->prepare("INSERT INTO national_parks (name, location, date_established, area_in_acres, park_description) VALUES (:name, :location, :date_established, :area_in_acres, :park_description);");

        
        //insert values into database after stripping tags/special chars etc
        $insert->bindValue(':name', $addedName, PDO::PARAM_STR);
        $insert->bindValue(':location', $addedLocation, PDO::PARAM_STR);
        $insert->bindValue(':date_established', $addedDate, PDO::PARAM_STR);
        $insert->bindValue(':area_in_acres', $addedSize, PDO::PARAM_STR);
        $insert->bindValue(':park_description', $addedDescription, PDO::PARAM_STR);

        $insert->execute();
        header('Location: /national_parks.php');
        die();
    }

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
            <label for="input" class="col-xs-2 col-form-label">Number of Parks Per page
            <input class="form-control" 
            type="number" 
            min="0" 
            placeholder="Parks Per Page" 
            name="limit">
            </label>
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
                    <label for="name-input" class="col-xs-2 col-form-label">Park Name</label>
                    <div class="col-xs-10">
                        <input class="form-control" 
                        type="text" 
                        placeholder="Park Name" 
                        name="name"
                        value="<?= Input::get('name') ?>">
                    </div>
                    <?php if(isset($errors['name'])) : ?>
                        <p><?= $errors['name']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <label for="location-input" class="col-xs-2 col-form-label">Location</label>
                    <div class="col-xs-10">
                        <input class="form-control" 
                        type="text" 
                        placeholder="Park Location (State)" 
                        name="location"
                        value="<?= Input::get('location') ?>">
                    </div>
                    <?php if(isset($errors['location'])) : ?>
                        <p><?= $errors['location']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <label for="date-input" class="col-xs-2 col-form-label">Date Established</label>
                    <div class="col-xs-10">
                        <input class="form-control" 
                        type="date" 
                        placeholder="YYYY-mm-dd" 
                        name="date_established"
                        value="<?= Input::get('date_established') ?>">
                    </div>
                    <?php if(isset($errors['date_established'])) : ?>
                        <p><?= $errors['date_established']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <label for="area-input" class="col-xs-2 col-form-label">Area of Park</label>
                    <div class="col-xs-10">
                        <input class="form-control" 
                        type="text" 
                        placeholder="Park Acreage" 
                        name="area_in_acres"
                        value="<?= Input::get('area_in_acres') ?>">
                    </div>
                    <?php if(isset($errors['area_in_acres'])) : ?>
                        <p><?= $errors['area_in_acres']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group row">
                    <label for="description-input" class="col-xs-2 col-form-label">Park Description</label>
                    <div class="col-xs-10">
                        <textarea class="form-control" 
                        placeholder="Describe the Park" 
                        name="park_description"
                        value="<?= Input::get('park_description') ?>">    
                        </textarea>
                    </div>
                    <?php if(isset($errors['park_description'])) : ?>
                        <p><?= $errors['park_description']; ?></p>
                    <?php endif; ?>
                </div>
                <button type="submit" 
                name="submit"
                class="btn btn-lg center-block">Submit
                </button>
            </form>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    </html>