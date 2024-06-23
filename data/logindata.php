<?php
session_start();
include('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query om gebruiker op te halen op basis van gebruikersnaam
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Controleer of het ingevoerde wachtwoord overeenkomt met het opgeslagen wachtwoord
        if ($user['password'] === $password) {
            $_SESSION['user_id'] = $user['usersID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol'] = $user['rol'];

            header("Location: ../index.php");
            exit();
        } else {
            // Onjuist wachtwoord
            header("Location: ../login.php?error=wrongpassword");
            exit();
        }
    } else {
        // Gebruiker niet gevonden
        header("Location: ../login.php?error=usernotfound");
        exit();
    }
} else {
    // Ongeldige methode (niet POST)
    header("Location: ../login.php");
    exit();
}
?>
