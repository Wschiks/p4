<?php include ('connection.php'); 

session_start();

if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != "admin" && $_SESSION['rol'] != "user")) {
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>



<?php include ('header.php'); ?>
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
                <div class="trip-item trip-img-boven" <?php if (array_key_exists('img', $key)) { ?>
                        style="background-image: url('<?= $key['img'] ?>'); background-size: cover; background-position: center;"
                    <?php } ?>>
                </div>
                <?php
            }
            ?>
        </div>
       
        <div class=" inforeis blauw ">
             <div class="inforeistext">
            <?php
            $sql = 'SELECT * FROM trip where tripID=:tripID';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':tripID', $tripID);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $key) {
                ?>
                <div class="tekstOver ">
                    <h3 class="geelfont popp fontsize"> Over <?php echo $key['stad'] ?> </h3>

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
                        <h3>  <?php  echo  $key['informatiestuk'] ?> </h3>
                    </div>
                </div>
                </div>
                <img class=fotoinfo src="<?php echo $key['infoIMG'] ?>" alt=Info Image>


                <?php
            }
            ?>

            
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#3F72FF" fill-opacity="1" d="M0,128L15,128C30,128,60,128,90,112C120,96,150,64,180,85.3C210,107,240,181,270,213.3C300,245,330,235,360,224C390,213,420,203,450,170.7C480,139,510,85,540,106.7C570,128,600,224,630,229.3C660,235,690,149,720,117.3C750,85,780,107,810,112C840,117,870,107,900,90.7C930,75,960,53,990,53.3C1020,53,1050,75,1080,96C1110,117,1140,139,1170,122.7C1200,107,1230,53,1260,69.3C1290,85,1320,171,1350,213.3C1380,256,1410,256,1425,256L1440,256L1440,0L1425,0C1410,0,1380,0,1350,0C1320,0,1290,0,1260,0C1230,0,1200,0,1170,0C1140,0,1110,0,1080,0C1050,0,1020,0,990,0C960,0,930,0,900,0C870,0,840,0,810,0C780,0,750,0,720,0C690,0,660,0,630,0C600,0,570,0,540,0C510,0,480,0,450,0C420,0,390,0,360,0C330,0,300,0,270,0C240,0,210,0,180,0C150,0,120,0,90,0C60,0,30,0,15,0L0,0Z"></path></svg>
        

        <div class="vluchtinfoplaats">
        <table class="tableblauw popp white">

            <?php
            foreach ($result as $key) {
                ?>
                <tr class="">
                    <th>Luchthaven aankomst</th>
                    <td> <?php echo $key['luchthavenaankomst'] ?></td>
                </tr>
                <tr class="geel">
                    <th>Luchthaven vertrek</th>
                    <td><?php echo $key['luchthavenvertek'] ?></td>
                </tr>
                <tr class="">
                    <th>Luchtvaartmaatschappij</th>
                    <td> <?php echo $key['Luchtvaartmaaschappij'] ?></td>
                </tr>
                <tr class="geel">
                    <th class="">Afstand</th>
                    <td><?php echo $key['Afstand'] ?></td>
                </tr>
                <tr class="">
                    <th>Vluchttijd</th>
                    <td> <?php echo $key['Vluchttijd'] ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <!-- <form action="data/dataWinkelmand.php" method="post">
    <input type="hidden" name="tripID" value="<?= $key['tripID'] ?>">
    <input type="submit" name="toevoegen_aan_winkelmand" value="Toevoegen aan winkelmand">
</form> -->

</form>

        </div>  
        </form>
      
        