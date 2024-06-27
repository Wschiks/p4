<?php
include ('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_info'])) {
    $infoID = $_POST['info_id'];
    $informatiestuk = $_POST['informatiestuk'];
    $infoIMG = $_POST['infoIMG'];
    $luchthavenaankomst = $_POST['luchthavenaankomst'];
    $luchthavenvertek = $_POST['luchthavenvertek'];
    $Luchtvaartmaaschappij = $_POST['Luchtvaartmaaschappij'];
    $Afstand = $_POST['Afstand'];
    $Vluchttijd = $_POST['Vluchttijd'];

    $sql = "UPDATE info SET 
                informatiestuk = :informatiestuk,
                infoIMG = :infoIMG,
                luchthavenaankomst = :luchthavenaankomst,
                luchthavenvertek = :luchthavenvertek,
                Luchtvaartmaaschappij = :Luchtvaartmaaschappij,
                Afstand = :Afstand,
                Vluchttijd = :Vluchttijd
            WHERE id = :infoID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':informatiestuk', $informatiestuk);
    $stmt->bindParam(':infoIMG', $infoIMG);
    $stmt->bindParam(':luchthavenaankomst', $luchthavenaankomst);
    $stmt->bindParam(':luchthavenvertek', $luchthavenvertek);
    $stmt->bindParam(':Luchtvaartmaaschappij', $Luchtvaartmaaschappij);
    $stmt->bindParam(':Afstand', $Afstand);
    $stmt->bindParam(':Vluchttijd', $Vluchttijd);
    $stmt->bindParam(':infoID', $infoID);
    $stmt->execute();

    header("Location: reis_details.php?tripID={$_POST['trip_id']}");
    exit;
}
?>