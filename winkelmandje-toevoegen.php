<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id']) && isset($_POST['flight_id'])) {
    $user_id = $_SESSION['user_id'];
    $flight_id = $_POST['flight_id'];
    $quantity = 1;

    // Controleer of de vlucht al in de winkelwagen staat
    $stmt = $conn->prepare("SELECT * FROM winkelmand WHERE user_id = ? AND flight_id = ?");
    $stmt->execute([$user_id, $flight_id]);
    $item = $stmt->fetch();

    if ($item) {
        // Als de vlucht al in de winkelwagen staat, update het aantal
        $new_quantity = $item['quantity'] + 1;
        $stmt = $conn->prepare("UPDATE winkelmand SET quantity = ? WHERE user_id = ? AND flight_id = ?");
        $stmt->execute([$new_quantity, $user_id, $flight_id]);
    } else {
        // Voeg de vlucht toe aan de winkelwagen
        $stmt = $conn->prepare("INSERT INTO winkelmand (user_id, flight_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $flight_id, $quantity]);
    }

    // Redirect naar winkelwagen pagina of een andere pagina
    header("Location: winkelwagen.php");
    exit();
} else {
    // Redirect naar login pagina als de gebruiker niet is ingelogd
    header("Location: login.php");
    exit();
}

