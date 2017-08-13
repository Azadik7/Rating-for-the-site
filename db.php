<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Azad Kemerbendi
 * Date: 08/13/2017
* Time: 01:18
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reyting";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}