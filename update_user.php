<?php session_start(); ?>
<?php
if (isset($_POST['name'])) {
    include 'includes/connect_db.php';
    $uid = $_SESSION['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "UPDATE `users` SET `name`='$name',`address`='$address',`phone_no`='$phone' WHERE sr_no = $uid";
    $update = mysqli_query($conn,$sql);
    if ($update) {
        $update = 1;
    }
    else {
        $update = 0;
    }
    header("location: user_profile.php?update=$update");
}
?>