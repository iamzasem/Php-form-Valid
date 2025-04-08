<?php

if($_SERVER["REQUEST_METHOD"] == "GET") {

    $username =  htmlspecialchars($_GET["username"]);
    $email = htmlspecialchars($_GET["email"]);

    echo "Name:" . $username . "<br>";
    echo "Email:" . $email;



}

else {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        echo "Name:" . $username . "<br>";
        echo "Email:" . $email;
    }

}





?>