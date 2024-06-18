<?php include ('header.php'); ?>
<?php include ('connection.php'); ?>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="bluevak">

</div>

<form action="data/datacontact.php" method="post">

    <section class="loginpage">
        <div class="loginform">
            <div class="logintitle">
                <h3 class="font">contact ons</h3>
            </div>
            <input class="logvak font" type="text" name="naam" placeholder="naam" required>

            <input class="logvak font" type="email" name="email" placeholder="email" required>


         <span><textarea class="logvakbericht font" placeholder="bericht"></textarea></span>
            


            <div class="submitvak">
                <input class=" loginbutton font" type="submit" value="verstuur">
            </div>
        </div>
    </section>

</form>
</body>
<?php include ('footer.php'); ?>
