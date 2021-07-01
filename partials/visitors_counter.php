<?php 
$ip = $_SERVER['REMOTE_ADDR'];
$check_ip_qry = "SELECT * FROM `unique_visitors` WHERE ip = '$ip'";
$check_ip = mysqli_query($conn,$check_ip_qry);
if (mysqli_num_rows($check_ip)==0) {
    $ip_ins_qry = "INSERT INTO `unique_visitors`(`ip`) VALUES ('$ip')";
    $ip_ins = mysqli_query($conn,$ip_ins_qry);
}
$ip_ins_qry2 = "INSERT INTO `visitors`(`ip`) VALUES ('$ip')";
$ip_ins2 = mysqli_query($conn,$ip_ins_qry2);

?>