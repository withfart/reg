<?php
session_start();
require "functions.php";
require "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];


if (!empty (get_user_by_email($email))) {
 set_flesh_message('danger', "<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.");
 redirect_to('/page_register.php');

}
add_user($email,$password);
set_flesh_message('success', "Регистрация успешна");
