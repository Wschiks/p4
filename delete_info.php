<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_info'])) {
    $infoID = $_POST['info_id'];

    $sql = "DELETE FROM info WHERE id = :infoID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':infoID', $infoID);
    $stmt->execute();

    header("Location: reis_details.php?tripID={$_POST['trip_id']}");
    exit;
}
?>
