<?php
// If user logs in with email and password
include 'includes/connect_db.php';
session_start();
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user_with_email'])) {
        $email = $_POST['loginEmail'];
        $pass = $_POST['loginPass'];
        $sql = "SELECT * FROM `users` WHERE email='$email' AND active = 1";
        $result = mysqli_query($conn,$sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows < 1) {
            $msg = "No account found!";
        }
        elseif ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                $_SESSION['loggedin'] = "user";
                $_SESSION['userEmail'] = $email;
                $_SESSION['userName'] = $row['name'];
                $_SESSION['user_id'] = $row['sr_no'];
                $un = $_SESSION['userName'];
                header("Location: /?login=0&user=$un");
                exit();
                }
            else{
            $msg = "Wrong Password";
            }
        }
        // it will redirect to home page and pass the message
        header("Location:login.php?login=0&msg=$msg");
        exit();
    }
}
// If someone tries to type url of this page directly
include('config.php');

if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
    
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['userName'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
   $_SESSION['userName'] = $data['given_name'].' '.$_SESSION['user_last_name'];
   $username = $_SESSION['userName'];
   $username = str_replace("'","&quot;","$username");
  }

  if(!empty($data['email']))
  {
    $gmail = $data['email'];
    $_SESSION['userEmail'] = $data['email'];
    $_SESSION['loggedin'] = "user";
  }
    $existqry = "select * from `users` where email = '$gmail'";
    $result = mysqli_query($conn,$existqry);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $message = "Email is already in use";
        $un = "Google ● ". $_SESSION['userName'];
        header("Location: http://localhost/work/Yug_Movies/yugmovies.savanpatel.tk/?login=0&user=$un&glnew=1");
        exit();
    }
    else{
        $sql2 = "INSERT INTO `users` (`name`, `email`) VALUES ('$username', '$gmail')";
        $result = mysqli_query($conn,$sql2);
        if ($result) {
            $message = "Regestered with google.";
            $un = $_SESSION['userName']."Google";
            header("Location: /?login=0&user=$un&glnew=1");
            exit();
        }
        else{
            $message = "qry me problem";
        }
    }
 }
}

?>