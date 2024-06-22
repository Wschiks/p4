<?php 
include ('connection.php');


$tripID = $_GET['tripID'];

$sql = 'SELECT * FROM info where tripID=:tripID';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':tripID', $tripID);
$stmt->execute();
$result = $stmt->fetchAll();
foreach ($result as $key) {
    
?> <a href="info.php?tripID=<?= $key['tripID'] ?>" class="trip-link">
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
   <?php } ?> 