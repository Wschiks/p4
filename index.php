<?php include('connection.php'); ?>
<?php include('header.php'); ?>
<?php include('eerste_oog.php'); ?>
<?php include('zoekbalk.php'); ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
</head>

<body>
    <section id="onze_reizen">
        <div class="flex">
            <h2 class="onze geelfont">Onze reizen</h2>
        </div>

        <div class="container">
            <?php
            $sql = "SELECT * FROM trip";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();


            foreach ($result as $key) {
                ?>
                <a href="info.php?tripID=<?= $key['tripID'] ?>" class="trip-link">
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
                        <?php } ?>
                    </div>
                </a>
                <?php

            }
            ?>
        </div>
    </section>
</body>
</html>


<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(function () {
        $(".menu, a").on('click', function () {
            $("html, body").animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 1500);
        });
    });
</script>

<?php include('overons.php'); ?>
<?php include('footer.php'); ?>
