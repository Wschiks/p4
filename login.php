<?php include ('header.php'); ?>
<body>

    <form method="POST">
        <div class="fotohacktergrond">
            <section class="midden">
                <label class="wit">username</label>
                <input type="text" name="username">
                <label class="wit">wachtwoord</label>
                <input type="password" name="password">
                <input type="submit">
                <a href="regristreren.php"><button type="button">nieuw account maken</button></a>
            </section>
        </div>
    </form>


</body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $_POST['username']);
        $result = $stmt->execute();

        $user = $stmt->fetch();

       


        if ($_POST['password'] == "admin" && $user['password'] == "admin") {
            header("Location: menuaanpassen.php");
        } else {


            if ($user && $_POST['wachtwoord'] == $user['wachtwoord']) {
                header("Location: index.php");

            } else {

                echo "Fout: Ongeldige gebruikersnaam of wachtwoord.";
            }
        }

    } else {

        echo "Fout: Vul zowel gebruikersnaam als wachtwoord in.";
    }

}




?>

