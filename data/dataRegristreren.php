<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('../connection.php'); 

?>




<?php
include ('../connection.php'); 

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$naam = $_POST["naam"];



    $sql = "INSERT INTO users (username, password, email, naam) VALUES (:username, :password, :email, :naam)";
    $stmt = $conn->prepare($sql);
    

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':naam', $naam);
    $result = $stmt->execute();
    

    if ($result) {
        header("Location: ../login.php");

        echo "Registration successful.";
    } else {
        echo "Registration failed.";
    }
