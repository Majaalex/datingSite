<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

//password_verify($_POST['password'], passwordhashed);
//how to get where username is this take out password to variable then compare with verify

if(!$array = db::instance()->get("SELECT * FROM users WHERE username = ? AND password = ?", array($_POST['username'],$_POST['password']))){
    echo "Username or password is incorrect!";
}else{
    echo "You are logged in!";
    $_SESSION['id'] = $array[0]['username'];
    echo $_SESSION['id'];
    header("Location: ./profile.php");
}
require_once '../resources/templates/footer.php';
