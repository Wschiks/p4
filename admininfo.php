<?php include ('connection.php'); ?>
<!DOCTYPE html>

<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    session_start();
    $_SESSION['user'] = $data['gebruikersnaam'];
    $_SESSION['rol'] = $data['rol'];
    ?>
    <?php include ('header.php'); ?>
    <?php include ('wijzigen.php'); ?>

    <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product'])) {
    include ('data/deletedata.php'); 
   }

    $sql = "SELECT * FROM producten";   // haalt de data uit producten
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $key) {
        echo '<div class="product">';
        echo '<div class="links">';
        if (array_key_exists('img', $key)) {
            echo '<img  height="100" src="', $key['img'], '" alt="', $key['productnaam'], '">';
        }
        echo '</div>';

        echo '<div class="rechts">';
        if (array_key_exists('productnaam', $key)) {
            echo '<h4 class="font">', $key['productnaam'], '</h4>';
        }
        if (array_key_exists('beschrijving', $key)) {
            echo '<h5 class="font">', $key['beschrijving'], '</h5>';
            
        }
        if (array_key_exists('prijs', $key)) {
            echo '<h6 class="font">', $key['prijs'], '</h6>';
        }
        echo '<form method="post" action="data/updatedata.php">';
        echo '<input type="hidden" name="product_id" value="' . $key['id'] . ' ">';
        echo '<textarea id="description" name="new_description">' . $key['beschrijving'] . '</textarea>';
        echo '<input type="submit" name="update_description" value="Update Beschrijving">';
        echo '</form>';

        echo '</div>';
        echo '</div>';
        echo '<form method="post" action="">';
        echo '<input type="hidden" name="product_id" value="' . $key['id'] . '">';
        echo '<input  type="submit" name="delete_product" value="Verwijderen">';
        echo '</form>';
    }
    ?>

<section id="overons">

<div class="overons-foto">
    <div class="fotovak1">
        <div class="foto1">
            <img src="img/overonsfoto1.png" alt="">
        </div>
        <div class="foto2">
            <img class="fotodiv" src="img/overonsfoto2.png" alt="">
        </div>
    </div>
    <div class="fotovak2">
        <div class="foto3">
            <img src="img/overonsfoto3.png" alt="">
        </div>
        <div class="foto4">
            <img src="img/overonsfoto4.png" alt="">
        </div>
    </div>
</div>
</div>

<div class="overons-text">
    <h3 class="lettergeel">onze reis</h3>
    <h3> <b>flieg.com</b> staat bekend om haar prachtige kant-en-klare reizen. Elke route is zorgvuldig
        samengesteld voor een onvergetelijke ervaring. Van culturele ontdekkingen tot avontuurlijke excursies,
        elke reis belooft schoonheid en mogelijkheden.</h3>
</div>
</section>
    <?php include ('footer.php'); ?>
</body>

</html>

