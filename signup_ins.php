<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/connect_db.php';
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    // Check email exist
    $existqry = "select * from `users` where email = '$user_email'";
    $result = mysqli_query($conn,$existqry);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $message = "Email is already in use";
    }
    else{
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$username', '$user_email', '$hash')";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                $message = "Sign up successful! You can login now.";
            }
            else{
                $message = "qry me problem";
            }
        }
        else{
            $message = "Passwords do not match";
        }
    }
header("Location: login.php?signup=0&message=$message");
}
?>