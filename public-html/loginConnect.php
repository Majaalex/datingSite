<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

$username = "";
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $query = db::instance()->get("SELECT password,username FROM users WHERE username = ? ", array($_POST['username']));


    if (password_verify($_POST['password'], $query[0]['password'])) {
        echo "You are logged in!";
        $_SESSION['id'] = $query[0]['username'];
        echo $_SESSION['id'];
        header("Location: ./browse.php");
    } else {
        $pass_error = 'Username or password is incorrect!';
    }
}

