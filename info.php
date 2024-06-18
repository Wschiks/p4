<?php include ('connection.php'); ?>
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
                ?>
                <div class="trip-item" <?php if (array_key_exists('img', $key)) { ?>
                        style="background-image: url('<?= $key['img'] ?>'); background-size: cover; background-position: center;"
                    <?php } ?>>
                </div>
                <?php
            }
            ?>
        </div>
        <div class=" blauw ">

            <?php
            $sql = 'SELECT * FROM trip where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key) {
                ?>
                <div class="tekstOver">
                    <h3> Over <?php echo $key['stad'] ?> </h3>

                </div>
                <?php
            }
            ?>


            <?php

            $tripID = $_GET['tripID'];

            $sql = 'SELECT * FROM info where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key) {
                ?>
                <div class="tekstOver">
                    <div class="content">
                        <h3> <?php echo $key['informatiestuk'] ?> </h3>
                    </div>
                </div>
                <img class=fotoinfo src="<?php echo $key['infoIMG'] ?>" alt=Info Image>


                <?php
            }
            ?>

        </div>



        <table>
            <?php
            foreach ($result as $key) {
                ?>
                <tr class="blauw">
                    <th>Luchthaven aankomst</th>
                    <td> <?php echo $key['luchthavenaankomst'] ?></td>
                </tr>
                <tr class="geel">
                    <th>Luchthaven vertrek</th>
                    <td><?php echo $key['luchthavenvertek'] ?></td>
                </tr>
                <tr class="blauw">
                    <th>Luchtvaartmaatschappij</th>
                    <td> <?php echo $key['Luchtvaartmaaschappij'] ?></td>
                </tr>
                <tr class="geel">
                    <th>Afstand</th>
                    <td><?php echo $key['Afstand'] ?></td>
                </tr>
                <tr class="blauw">
                    <th>Vluchttijd</th>
                    <td> <?php echo $key['Vluchttijd'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>