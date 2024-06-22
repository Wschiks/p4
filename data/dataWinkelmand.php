<?php
include ('connection.php');

session_start();
if(isset($_SESSION['tripID'])){

// Retrieve data from the form
$tripID = $_POST["tripID"];


    $sql_check = "SELECT * FROM orders WHERE tripID = :tripID";
$prepare_check = $conn->prepare($sql_check);
$prepare_check->bindParam(':tripID', $tripID);
$prepare_check->execute();
if ($prepare_check->rowCount() > 0) {

    $sql_update = "UPDATE orders SET aantal = aantal + 1 WHERE tripID = :tripID";
    $prepare_update = $conn->prepare($sql_update);
    $prepare_update->bindParam(':tripID', $tripID);
    $prepare_update->execute();
} else {
    $aantal = 1;
    // If the product doesn't exist, insert a new row
    $sql_insert = "INSERT INTO boekingen (tripID, usersID, aantal) VALUES (:tripID, :usersID, :aantal)";
    $prepare_insert = $conn->prepare($sql_insert);
    $prepare_insert->bindParam(':tripID', $tripID);
    $prepare_insert->bindParam(':usersID', $usersID["usersID"]);

    $prepare_insert->execute();
}

header('Location: index.php');
}
else
{
header('Location: inlog.php');
}
