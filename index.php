<?php include ('connection.php'); ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container blauw">
        <?php
        $sql = "SELECT * FROM trip";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $key) {
            echo '<div class="trip-item geel">';
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
</body>
</html>
