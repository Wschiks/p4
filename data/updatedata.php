<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../connection.php';

$tripID = $_POST['tripID'];
$luchthavenaankomst = $_POST['luchthavenaankomst'];
$luchthavenvertek = $_POST['luchthavenvertek'];
$Luchtvaartmaaschappij = $_POST['Luchtvaartmaaschappij'];
$Afstand = $_POST['Afstand'];
$Vluchttijd = $_POST['Vluchttijd'];


if (isset($tripID) && isset($luchthavenaankomst) && isset($luchthavenvertek) && isset($Luchtvaartmaaschappij) && isset($Afstand) && isset($Vluchttijd)) {
    $sql = "UPDATE info SET luchthavenaankomst=:luchthavenaankomst, luchthavenvertek=:luchthavenvertek, Luchtvaartmaaschappij=:Luchtvaartmaaschappij, Afstand=:Afstand, Vluchttijd=:Vluchttijd WHERE tripID=:tripID";      
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':luchthavenaankomst', $luchthavenaankomst);
    $stmt->bindParam(':luchthavenvertek', $luchthavenvertek);
    $stmt->bindParam(':Luchtvaartmaaschappij', $Luchtvaartmaaschappij);
    $stmt->bindParam(':Afstand', $Afstand);
    $stmt->bindParam(':Vluchttijd', $Vluchttijd);
    $stmt->bindParam(':tripID', $tripID);


    if ($stmt->execute()) {
        header('Location: ../admin.php');
    } else {
        echo "Error updating tripID: " . $tripID;
    }
} else {
    echo "niet all evelden zijn ingevluld";
}

