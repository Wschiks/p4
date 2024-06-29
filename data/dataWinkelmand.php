<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
include ('../connection.php');
session_start();

$usersID = $_SESSION['usersID'];


$tripID = $_POST['tripID'];


$sql = "INSERT INTO orders (usersID, tripID) VALUES (:usersID, :tripID)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':usersID', $usersID);
$stmt->bindParam(':tripID', $tripID);

$result = $stmt->execute();

if ($result) {
    header('Location: ../index.php');
    // header('Location: ../winkelmandpage.php');
} else {
    echo "Er is een fout opgetreden bij het toevoegen van de bestelling.";
}



