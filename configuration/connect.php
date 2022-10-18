<?php
$host = "localhost";
$dbuser="root";
$dbpass="";
$dbname="school";
$dbconnection=@mysqli_connect($host,$dbuser,$dbpass,$dbname);
if (!$dbconnection) {
    echo "no access";
} else {
    echo " access";
}


