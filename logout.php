<?php
session_start();
require_once "functions.php";

unset($_SESSION['login']);
redirect_to('/login_in.php');

?>