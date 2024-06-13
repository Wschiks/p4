<?php include('connection.php'); ?>
<?php include('header.php'); ?>
<section class="blauw container">

    <?php
    $sql = "SELECT * FROM contact";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $key) {
        ?>
        <div class="contactBerichten geel">
            <h3><?php echo $key['cantactID'] ?></h3>
            <h3><?php echo $key['email'] ?></h3>
            <h3><?php echo $key['naam'] ?></h3>
            <h3><?php echo $key['bericht'] ?></h3>
        </div>
        <?php
    }
    ?>

</section>
