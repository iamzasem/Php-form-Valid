<?php

$servername = "localhost";
$username  = "root";

$password = "nitro";

$dbname = "zasim";

$conn = new mysqli ($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die ("connection failed:" . $conn->connect_error);

}

echo "database connected successfully <br>";


?>