<?php include ('header.php'); ?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="bluevak">

</div>
    <form method="POST" action=data/logindata.php>
        <section class="loginpage">
            <div class="loginform">
                <div class="logintitle">
                    <h3 class="font">LOGIN</h3>
                </div>

                <input class="logvak font" type="text" name="username" placeholder="username">
                <div class="wwinput">

                    <input class="logvak font" type="password" name="password" placeholder="password">
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

<?php include ('footer.php'); ?>