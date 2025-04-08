<?php

require "load.php";
$sql = "CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    first_name VARCHAR(50 ) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    address VARCHAR(50) NOT NULL

);";

if($conn->query($sql) === TRUE) {
    echo "table is created successfully <br>";

}

else {
    echo "error creating table:" . $sql . "<br>" . $conn->error;
}

$conn->close();

?>