<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="reis_info">
        <div class="flex">
            <h2 class="onze geelfont">Reis Informatie</h2>
        </div>
        <div class="container">
            <?php
            if (isset($_GET['img']) && isset($_GET['land']) && isset($_GET['stad']) && isset($_GET['personen']) && isset($_GET['prijs'])) {
                $img = htmlspecialchars($_GET['img']);
                $land = htmlspecialchars($_GET['land']);
                $stad = htmlspecialchars($_GET['stad']);
                $personen = htmlspecialchars($_GET['personen']);
                $prijs = htmlspecialchars($_GET['prijs']);

                echo '<div class="trip-item" style="background-image: url(\'' . $img . '\'); background-size: cover; background-position: center;">';
                echo '<div class="trip-info">';
                echo '<h3>' . $land . '</h3>';
                echo '<h3>' . $stad . '</h3>';
                echo '<h3>personen: ' . $personen . '</h3>';
                echo '</div>';
                echo '<div class="trip-price">';
                echo '<h3>Vanaf:</h3>';
                echo '<h3>&euro;' . $prijs . '</h3>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p>Geen reis informatie beschikbaar.</p>';
            }
            ?>
        </div>
    </section>
</body>
</html>
