<?php
if (isset($_POST['add_album_selection'])) {
    include '../../includes/connect_db.php';
    $user_id = $_POST['user_id'];
    $album_name = $_POST['album_name'];
    $album_link = $_POST['album_link'];
    // Check selection already exist (Or it will useful when someone hanges the source and sends POST request)
    $existqry = "SELECT * FROM `album_select` WHERE user_id = '$user_id'";
    $result = mysqli_query($conn,$existqry);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $message = "Album is already added!";
    }
    else{
        $sql = "INSERT INTO `album_select`(`user_id`, `album_name`, `select_link`) VALUES ($user_id, '$album_name', '$album_link')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            $message = "Album added successfully! User will redirected to inserted link.";
        }
        else{
            $message = "qry me problem! Some field contins quotes(')";
        }
        
    }
    header("location: ../pages/tables/album.php?message=$message");
}
else{
    header("location: ../../admin");
}
?>