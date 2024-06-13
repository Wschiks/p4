<?php include ('header.php'); ?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="bluevak">

</div>
    <form method="POST">
<<<<<<< HEAD

        <section class="loginpage">
            <div class="loginform">
                <div class="logintitle">
                    <h3 class="font">LOGIN</h3>
                </div>

                <input class="logvak font" type="text" name="gebruikersnaam" placeholder="gebruikersnaam">
                <div class="wwinput">

                    <input class="logvak font" type="password" name="wachtwoord" placeholder="wachtwoord">
                    <div>
                        <a class="to_register fontgrey" href="regristreren.php">registeren</a>
                    </div>
                </div>
                <div class="submitvak">
                <input class=" loginbutton font" type="submit" value="login">
                </div>
            </div>
        </section>


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
<?php include ('footer.php'); ?>