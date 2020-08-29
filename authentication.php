<?php
session_start();
require "connect.php";
require "functions.php";


$email = $_POST['email'];
$password = $_POST['password'];

$login = login($email,$password);
if (!empty($login)){
redirect_to('/home.php');
exit();
}
redirect_to("/login_in.php");