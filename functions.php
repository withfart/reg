<?php

function get_user_by_email ($email)
{
    require "connect.php";
    $sql = "SELECT * FROM people WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    return $user;

}

function add_user ($email, $password)
{
    require "connect.php";
    $sql = "INSERT INTO people (email, password) VALUES (:email, :password)";
    $statement = $pdo->prepare($sql);
    $statement->execute(["email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)]);

}
function set_flesh_message ($name, $message)
{
    $_SESSION[$name] = $message;
}

function display_flesh_message ($name)
{
    if (isset($_SESSION[$name])) {
        echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);
    }
}

function redirect_to ($path){
    header('Location:' . $path);
}



function login ($email, $password)
{

    require "connect.php";
    $user = get_user_by_email($email);

    if (!empty($user)) {
        if (password_verify($password, $user['password'])){
            set_flesh_message('success', 'Вы авторизовались');
            $_SESSION['login'] = $email;
            return true;
        }
    }
    set_flesh_message('danger', 'Неверный логин или пароль');
    return false;

}