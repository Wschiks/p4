<?php include ('connection.php'); ?>
<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="nl">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<head>
    <link rel="stylesheet" href="css/style.css">
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
            echo '<a href=info.php?tripID='. $key['tripID'] .' class=trip-link>';
            echo '<div class="trip-item"';
            if (array_key_exists('img', $key)) {
                echo ' style="background-image: url(\'' . $key['img'] . '\'); background-size: cover; background-position: center;"';
            }
            echo '>';
            echo '<div class="trip-info">';
            if (array_key_exists('land', $key)) {
                echo '<h3>' . $key['land'] . '</h3>';
            }
            if (array_key_exists('stad', $key)) {
                echo '<h3>' . $key['stad'] . '</h3>';
            }
            if (array_key_exists('personen', $key)) {
                echo '<h3>personen: ' . $key['personen'] . '</h3>';
            }
            echo '</div>';
            if (array_key_exists('prijs', $key)) {
                echo '<div class="trip-price">';
                echo '<h3>Vanaf:</h3>';
                echo '<h3>&euro;' . $key['prijs'] . '</h3>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
    </section>
</body>
</html>