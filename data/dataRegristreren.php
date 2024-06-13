
<?php
include ('connection.php'); 
$username= $_POST["username"];
$password= $_POST["password"];
$email= $_POST["email"];
$naam= $_POST["naam"];

$sql = "INSERT INTO users (username, password, email, naam) VALUES (:username, :password, :email, :naam)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':naam', $naam);


    $result = $stmt->execute();
var_dump($result);

    