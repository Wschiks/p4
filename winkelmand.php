<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('connection.php');

if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != "admin" && $_SESSION['rol'] != "user")) {
    header("Location: login.php");
    exit();
}

// Haal de gebruikersID op uit de sessie
if (isset($_SESSION['usersID'])) {
    $usersID = $_SESSION['usersID'];

    // Haal de winkelwagen items op voor de ingelogde gebruiker
    $stmt = $conn->prepare("SELECT w.id, t.flight_name, t.price, w.quantity FROM winkelmandje w JOIN trip t ON w.tripID = t.id WHERE w.usersID = ?");
    $stmt->execute([$usersID]);
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Fout: Geen geldige gebruikersID in de sessie.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen</title>
</head>
<body>
    <h1>Jouw Winkelwagen</h1>
    <ul>
        <?php foreach ($cart_items as $item): ?>
            <li>
                <div class="trip-item">
                    <div class="trip-info">
                        <h3><?= htmlspecialchars($item['flight_name']) ?></h3>
                        <p>Aantal: <?= htmlspecialchars($item['quantity']) ?></p>
                    </div>
                    <div class="trip-price">
                        <h3>Prijs per stuk:</h3>
                        <h3>&euro;<?= htmlspecialchars($item['price']) ?></h3>
                        <h3>Totaal:</h3>
                        <h3>&euro;<?= htmlspecialchars($item['price'] * $item['quantity']) ?></h3>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="checkout.php">Afrekenen</a>
</body>
</html>
