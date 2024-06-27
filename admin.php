<?php include('connection.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<body class="midden">
    <div class="margin mid">
        <form action="data/admindata.php" method="post">

            <label class="mid">land</label>
            <input class="width100" type="text" name="land">

            <label class="mid">stad</label>
            <input class="width100" type="text" name="stad">

            <label class="mid">prijs</label>
            <input class="width100" type="text" name="prijs">

            <label class="mid">personen</label>
            <input class="width100" type="text" name="personen">

            <label class="mid">img</label>
            <input class="width100" type="text" name="img">

            <input class="width100" type="submit">
        </form>
    </div>

    <div class="container">
        <?php
        $sql = "SELECT * FROM trip";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $key) {
            ?>
            <a href="admininfo.php?tripID=<?= $key['tripID'] ?>" class="trip-link">
            <div class="trip-item margintopbot" <?php if (array_key_exists('img', $key)) { ?>
                    style="background-image: url('<?= $key['img'] ?>'); background-size: cover; background-position: center;"
                  
                <?php } ?>>
                <div class="trip-info margintopbot">
                    <?php if (array_key_exists('land', $key)) { ?>
                        <h3><?= $key['land'] ?></h3>
                    <?php } ?>
                    <?php if (array_key_exists('stad', $key)) { ?>
                        <h3><?= $key['stad'] ?></h3>
                    <?php } ?>
                    <?php if (array_key_exists('personen', $key)) { ?>
                        <h3>personen: <?= $key['personen'] ?></h3>
                    <?php } ?>
                </div>
                <?php if (array_key_exists('prijs', $key)) { ?>
                    <div class="trip-price">
                        <h3>Vanaf:</h3>
                        <h3>&euro;<?= $key['prijs'] ?></h3>
                    </div>

                    <form method="post" action="data/deletedata.php">
                        <input type="hidden" name="tripID" value="<?= $key['tripID'] ?>">
                        <input type="submit" name="delete_product" value="Verwijderen">
                    </form>

                <?php } ?>
            </div>
            </a>
            <?php
        }
        ?>
    </div>

</body>
