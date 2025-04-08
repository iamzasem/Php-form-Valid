<?php
require "load.php";

$firstname=$lastname=$email=$address="";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["first_name"];
    $lastname = $_POST["last_name"];
    $email= $_POST["email"];
    $address = $_POST["address"];
}
    $stmt = $conn-> prepare("INSERT INTO students (first_name,last_name,email,address) VALUES (?,?,?,?)");

    $stmt->bind_param("ssss", $firstname,$lastname,$email,$address);

    if($stmt->execute()) {
        echo "new record created successfully";

    }

    else {
        echo "error:" . $stmt ->error;

    }

    $stmt ->close();

$conn-> close();


?>
