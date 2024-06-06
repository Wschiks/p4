<?php include('connection.php'); ?>
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="reis_info">
        <div class="infoContainer">
            <?php
            $tripID = $_GET['tripID'];

            $sql = 'SELECT * FROM trip where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key) {
                echo '<div class="trip-item"';
                if (array_key_exists('img', $key)) {
                    echo ' style="background-image: url(\'' . $key['img'] . '\'); background-size: cover; background-position: center;"';
                }
                echo '></div>';
            }
            ?>
        </div>

        <div class="geel">
            <?php
            // Stel $tripID in op 1
            $tripID = $_GET['tripID'];

            $sql = 'SELECT * FROM info where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key) {
                if (array_key_exists('stad', $key)) {
                    echo '<h1 style="text-align: center;">' . $key['stad'] . '</h1>';
                }
                if (array_key_exists('informatiestuk', $key)) {
                    echo '<p>' . $key['informatiestuk'] . '</p>';
                }
                if (array_key_exists('infoIMG', $key)) {
                    echo '<img src="' . $key['infoIMG'] . '" alt="Info Image" style="float: left; margin-right: 20px;">';
                }
            }
            ?>
        </div>

        <table>
            <?php
            foreach ($result as $key) {
                echo '<tr>';
                if (array_key_exists('luchthavenaankomst', $key)) {
                    echo '<td>Luchthaven aankomst: ' . $key['luchthavenaankomst'] . '</td>';
                }
                echo '</tr>';
                echo '<tr>';
                if (array_key_exists('luchthavenvertek', $key)) {
                    echo '<td>Luchthaven vertrek: ' . $key['luchthavenvertek'] . '</td>';
                }
                echo '</tr>';
                echo '<tr>';
                if (array_key_exists('Luchtvaartmaaschappij', $key)) {
                    echo '<td>Luchtvaartmaatschappij: ' . $key['Luchtvaartmaaschappij'] . '</td>';
                }
                echo '</tr>';
                echo '<tr>';
                if (array_key_exists('Afstand', $key)) {
                    echo '<td>Afstand: ' . $key['Afstand'] . '</td>';
                }
                echo '</tr>';
                echo '<tr>';
                if (array_key_exists('Vluchttijd', $key)) {
                    echo '<td>Vluchttijd: ' . $key['Vluchttijd'] . '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </section>
</body>
</html>
