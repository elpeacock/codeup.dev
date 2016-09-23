<?php

//set connex params for parks db
const DB_HOST = '127.0.0.1';
const DB_NAME = 'parks_db';
const DB_USER = 'parks_user';
const DB_PASS = 'parks';

//req db_connect
require_once '../db_connect.php';




//wrap parks in page controller
function pageController ($dbc) {
    $data = array();
    // what page are we on? 
    if (!empty($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    $data['total'] = $dbc->query('SELECT COUNT(*) FROM national_parks;')->fetchColumn();

    //offset maths
    $limit = 4;
    $offset = ($currentPage - 1) * $limit;

    function getParks ($dbc, $limit, $offset) {
    //pull the parks from database
        $query = $dbc->query('SELECT * FROM national_parks LIMIT ' . $limit . ' OFFSET ' . $offset . ';');
        $allTheRows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $allTheRows;
    }

    $parks = getParks($dbc, $limit, $offset);
    $data['parks'] = $parks;
    $data['currentPage'] = $currentPage;
    return $data;
}

extract(pageController($dbc));



?>

<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <p>

            <table>
                <th>Name</th>
                <th>Location</th>
                <th>Date Established</th>
                <th>Area In Acres</th>
                <?php foreach ($parks as $index => $park) : ?>
                    <tr>
                        <td><?= $park['name'] ?></td>
                        <td><?= $park['location'] ?></td>
                        <td><?= $park['date_established'] ?></td>
                        <td><?= $park['area_in_acres'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </p>
    </div>
    <div id="footer">
        <div class="container">

            <div id="pages">
                <?php
                if($currentPage > 1)
                {
                    echo "<a href='?page=".($currentPage-1)." '>Previous  </a> ";
                }
                for ($i=1; $i<=($total/4); $i++)
                    if($i == $currentPage)
                    {
                        echo $i;
                    } else {
                        echo "<a href='?page=".($i)." '>"." " .$i." "."</a>";
                    }
                    if($currentPage < $total)
                    {
                        echo "<a href='?page=".($currentPage+1)." '>  Next</a> ";
                    } 
                    ?>

                </div>
            </div>
        </div>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
    </html>