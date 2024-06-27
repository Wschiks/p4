<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('../connection.php');

// Controleer of de gebruiker is ingelogd en of de rol admin of user is
if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != "admin" && $_SESSION['rol'] != "user")) {
    header("Location: login.php");
    exit();
}

// Zorg ervoor dat $_SESSION['usersID'] correct is ingesteld na het inloggen
// Dit moet al gedaan zijn bij het inloggen, niet hier opnieuw
if (!isset($_SESSION['usersID'])) {
    echo "Fout: Geen geldige gebruikersID in de sessie.";
    exit();
}

if (isset($_POST['toevoegen_aan_winkelmand'])) {
    $usersID = $_SESSION['usersID']; // Haal usersID op uit de sessie
    $tripID = $_POST['tripID']; // Controleer of tripID is ingesteld

    if (isset($tripID)) {
        // Controleer eerst of de reis niet al in de winkelmand van de gebruiker zit
        $checkSql = "SELECT * FROM winkelmandje WHERE usersID = :usersID AND tripID = :tripID";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':usersID', $usersID);
        $checkStmt->bindParam(':tripID', $tripID);
        $checkStmt->execute();
        $rowCount = $checkStmt->rowCount();

        if ($rowCount == 0) { // Als de reis nog niet in de winkelmand zit, voeg deze toe
            $insertSql = "INSERT INTO winkelmandje (usersID, tripID) VALUES (:usersID, :tripID)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bindParam(':usersID', $usersID);
            $insertStmt->bindParam(':tripID', $tripID);
            $insertStmt->execute();
        }

        // Correcte doorsturing naar de winkelmandpagina na toevoegen
        header("Location: ../winkelmand.php");
        exit();
    } else {
        // Handle het geval wanneer $_POST['tripID'] niet is ingesteld
        echo "Geen tripID ontvangen.";
        exit();
    }
} else {
    // Handle het geval wanneer $_POST['toevoegen_aan_winkelmand'] niet is ingesteld
    echo "Formulier niet verzonden.";
    exit();
}
?>
