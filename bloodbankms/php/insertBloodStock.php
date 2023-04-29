<?php
include_once('server.php');

if(isset($_POST['donorID'])){
    $donorID = $_POST['donorID'];

    // insert the donor ID into the blood_stocks table
    $sql = "INSERT INTO blood_stocks (donorID) VALUES ('$donorID')";
    if(mysqli_query($db, $sql)){
        echo "success";
    } else{
        echo "error";
    }
}
?>