<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../includes/connect_db.php';
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    // Check email exist
    $existqry = "select * from `users` where email = '$user_email'";
    $result = mysqli_query($conn,$existqry);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $message = "Email is already in use";
    }
    else{
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`name`, `email`, `password`, `address`, `phone_no`) VALUES ('$username', '$user_email', '$hash', '$address', '$phone')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            $message = "Sign up successful! You can login now.";
        }
        else{
            $message = "qry me problem";
        }
        
    }
    header("location: ../pages/tables/users.php?message=$message");
}
else{
    header("location: ../../admin");
}
?>