<?php include ('header.php'); ?>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="registerachtergrond">
    <form action="data/dataRegristreren" method="post">
        <section class="midden">
            <label class="wit">gebruikersnaam</label>
            <input type="text" name="username" required>

            <label class="wit">wachtwoord</label>
            <input type="password" name="password" required>

            <label class="wit">e-mail</label>
            <input type="email" name="email" required>

            <label class="wit">naam</label>
            <input type="text" name="naam" required>

            <input type="submit" value="Registreren">
        </section>
    </form>
    </div>
</body>
