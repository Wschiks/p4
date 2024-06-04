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
            $tripID = $_GET['tripID'];

            $sql = 'SELECT * FROM trip where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
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


