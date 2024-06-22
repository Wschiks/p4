<?php
include ('../connection.php');
var_dump($_POST['username']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $result = $stmt->execute();

        $user = $stmt->fetch();

        if ($user['username'] === $username && $user['password'] === $password) {
            header("Location: ../index.php");
                    session_start();
                    $_SESSION['user'] = $user['username'];
                    $_SESSION['rol'] = $user['rol'];
            }
             else {
                ?>
                <script>alert("Fout: Ongeldige username of password.")</script>; 
                <?php
                 
            }

    }   

}




