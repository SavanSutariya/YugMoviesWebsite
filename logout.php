<?php
session_start();
include('config.php');
$google_client->revokeToken();
session_destroy();
header("location: /")
?>