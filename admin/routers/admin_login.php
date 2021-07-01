<?php
if (isset($_POST['admin_wants_to_log_in'])) {
    include '../../includes/connect_db.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($user == $row['username'])
    {
        if($pass == $row['password']){
            session_start();
            $_SESSION['admin_logged'] = "admin";
            header("Location: ../?login=1");
            exit();
        }
        else{
        $msg = "Wrong Password";
        }
    }
    else {
        $msg = "Wrong username!";
    }
    // it will redirect to home page and pass the message
     header("Location:../../pages/login/?login=0&msg=$msg");
     exit();

}
// If someone tries to type url of this page directly
header("Location: /");
?>