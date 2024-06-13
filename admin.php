<?php include('connection.php'); ?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Onze Reizen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section id="onze_reizen">
        <div class="flex">
            <h2 class="onze geelfont">Onze reizen</h2>
        </div>

        <div class="container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_trip'])) {
                $tripID = $_POST['trip_id'];
                $sql = "DELETE FROM trip WHERE tripID = :tripID";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':tripID', $tripID, PDO::PARAM_INT);
                $stmt->execute();
            }

            $sql = "SELECT * FROM trip";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $key) {
                echo '<div class="trip-item margintopbot">';
                echo '<a href="infodata.php?tripID=' . $key['tripID'] . '" class="trip-link">';
                if (array_key_exists('img', $key)) {
                    echo '<div style="background-image: url(\'' . $key['img'] . '\'); background-size: cover; background-position: center;"></div>';
                }
                echo '<div class="trip-info margintopbot">';
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
                echo '</a>';

                // Delete form
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="trip_id" value="' . $key['tripID'] . '">';
                echo '<input type="submit" name="delete_trip" value="Verwijderen">';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
</body>

</html>

<?php include('footer.php'); ?>
