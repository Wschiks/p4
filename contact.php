<?php include ('header.php'); ?>
<?php include ('connection.php'); ?>

<body>
    
    <form action="data/datacontact.php" method="POST">
        <section class="midden">
            <label class="wit">gebruikersnaam</label>
            <input type="text" name="naam" required>


            <label class="wit">e-mail</label>
            <input type="email" name="email" required>

            <label class="wit">bericht</label>
            <input type="text" name="bericht" required>

            <input type="submit" value="Registreren">
        </section>
    </form>
</body>
