<?php
include '../../includes/connect_db.php';
if(isset($_POST['save_user'])){
    $sr_no = $_POST['sr_no'];
    if (isset($_POST['active'])) {
        $qry = "UPDATE `users` SET `active`= 1 WHERE sr_no = $sr_no";
    }
    else {
        $qry = "UPDATE `users` SET `active`= 0 WHERE sr_no = $sr_no";
    }
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/users.php");
    }
}
else{
    header("location: ../../admin");
}
?>