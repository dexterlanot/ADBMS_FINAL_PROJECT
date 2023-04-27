<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'blood_bank';

    $connection = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_error()) {
        echo "Message: ".mysqli_connect_error()."<br>";
    }
?>