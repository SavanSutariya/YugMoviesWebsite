<?php session_start(); ?>
<?php 

include('includes/connect_db.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    if($name != "" && $email != "" && $msg != ""){
        $sql = "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$name','$email','$msg')";
        $insert = mysqli_query($conn,$sql);
        if($insert){
            header("location:contact.php?ins=1");
        }
        else{
            echo"EErrOOrr";
        }
    }
    else{
        echo"Empty";
    }

}
else{
header("location:contact.php");
}

?>