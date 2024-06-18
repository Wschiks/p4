<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../connection.php'); 

$sql = "INSERT INTO trip(land, stad, prijs, personen, img) VALUES (:land, :stad, :prijs, :personen, :img)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':land', $_POST['land']);
$stmt->bindParam(':stad', $_POST['stad']);
$stmt->bindParam(':prijs', $_POST['prijs']);
$stmt->bindParam(':personen', $_POST['personen']);
$img = isset($_POST['img']) && !empty($_POST['img']) ? $_POST['img'] : 'img/test.png';
$stmt->bindParam(':img', $img);

$result = $stmt->execute();

$selectsql = "SELECT TripID FROM trip WHERE land = :land AND stad = :stad and personen = :personen";
$stmt = $conn->prepare($selectsql);
$stmt->bindParam(':land', $_POST['land']);
$stmt->bindParam(':stad', $_POST['stad']);
$stmt->bindParam(':personen', $_POST['personen']);
$stmt->execute();
$tripid = $stmt->fetch();


$infoIMG = "img/test.png";
$informatiestuk = "test";
$luchthavenaankomst = "test";
$luchthavenvertek = "test";
$Luchtvaartmaaschappij = "test";
$Afstand = "999";
$Vluchttijd = "999";

$sql = "INSERT INTO info (infoIMG, informatiestuk, luchthavenaankomst, luchthavenvertek, Luchtvaartmaaschappij, Afstand, Vluchttijd, TripID) VALUES (:infoIMG, :informatiestuk, :luchthavenaankomst, :luchthavenvertek, :Luchtvaartmaaschappij, :Afstand, :Vluchttijd, :tripid)";
$stmt = $conn->prepare($sql);



$stmt->bindParam(':infoIMG', $infoIMG);
$stmt->bindParam(':informatiestuk', $informatiestuk);
$stmt->bindParam(':luchthavenaankomst', $luchthavenaankomst);
$stmt->bindParam(':luchthavenvertek', $luchthavenvertek);
$stmt->bindParam(':Luchtvaartmaaschappij', $Luchtvaartmaaschappij);
$stmt->bindParam(':Afstand', $Afstand);
$stmt->bindParam(':Vluchttijd', $Vluchttijd);
$stmt->bindParam(':tripid', $tripid[0]);
$result = $stmt->execute();

if ($result) {
    header('Location: ../admin.php');
} else {
    echo 'FOUT';
    exit;
}



