<?php
include '../../includes/connect_db.php';
if(isset($_POST['delete_work'])){
    $sr_no = $_POST['id'];
    $qry = "DELETE FROM `services_img` WHERE id = $sr_no";
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/services.php");
    }
}
else{
    header("location: ../../admin");
}
?>