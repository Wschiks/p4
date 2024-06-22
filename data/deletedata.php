<?php include('../connection.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php 
         $id_to_delete = $_POST['tripID'];
         $sql_delete = "DELETE FROM trip WHERE tripID = :tripID";
         $stmt_delete = $conn->prepare($sql_delete);
         $stmt_delete->bindParam(':tripID', $id_to_delete);
         $stmt_delete->execute();

        if($stmt_delete){
            header('Location: ../admin.php');
        }else{
            echo 'FOUT';
        }
    

