<?php
if(isset($_POST['save_album'])){
    include '../../includes/connect_db.php';
    $sr_no = $_POST['sr_no'];
    $name = $_POST['name'];
    $link = $_POST['link'];
        $qry = "UPDATE `album_select` SET `album_name`='$name',`select_link`='$link' WHERE id = $sr_no";
    $update = mysqli_query($conn,$qry);
    if ($update) {
        header("location: ../pages/tables/album.php");
    }
    else {
        echo "Error! You have entered some special charecters which are not supported e.g. quotes(') <a href='../pages/tables/album.php'>Back</a>";
    }
}
else{
    header("location: ../../admin");
}
?>