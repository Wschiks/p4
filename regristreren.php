<?php include ('header.php'); ?>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="registerachtergrond">
    <form action="data/dataRegristreren.php" method="post">

    

        <section class="loginpage">
            <div class="loginform">
                <div class="logintitle">
                    <h3 class="font">registreren</h3>
                </div>
                <input class="logvak font" type="text" name="naam" placeholder="naam" required>

                <input class="logvak font" type="email" name="email" placeholder="email" required>

                <input class="logvak font" type="text" name="username" placeholder="gebruikersnaam">


                <input class="logvak font" type="password" name="password" placeholder="wachtwoord">


                <div class="submitvak">
                    <input class=" loginbutton font" type="submit" value="registreren">
                </div>
            </div>
        </section>

    </form>

</body>
<?php include ('footer.php'); ?>