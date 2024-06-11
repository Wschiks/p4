<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ('../connection.php'); 

?>

<?php
include ('../connection.php'); 

$naam = $_POST["naam"];
$email = $_POST["email"];
$bericht = $_POST["bericht"];



    $sql = "INSERT INTO contact (naam, email, bericht) VALUES (:naam, :email, :bericht)";
    $stmt = $conn->prepare($sql);
    

    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':bericht', $bericht);
    $result = $stmt->execute();

    if ($result) {
     
        header("Location: ../index.php");
    } else {
        echo "Registration failed.";
    }
