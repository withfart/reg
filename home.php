<?php
session_start();

require 'functions.php';
if (empty($_SESSION['login'])) {
    redirect_to('/login_in.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color: rgba(22,130,215,0.58)">

<h1 class="m-5">Привет! <?php echo $_SESSION['login'];  ?></h1>

<button class="m-5 btn-link fs-xl">
    <a href="logout.php">Exit</a>
</button>

</body>
</html>