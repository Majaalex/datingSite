<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';


//TODO COMMENT CODE
if (isset($_POST['save'])) {

    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $newPassCheck =$_POST['newPassCheck'];

$query = db::instance()->get("SELECT * FROM users WHERE username = ? ", array($_SESSION['id']));

    if (!password_verify($oldPass, $query[0]['password'])) {
        $oldPass_error = '<font color="red">Old password is incorrect</font>';                                                                         //TODO change to css
    }else if($newPass != $newPassCheck){
        $newPass_error = '<font color="red">New password does not match</font>';
    }else if($oldPass == $newPass){
        $newPassSame_error = '<font color="red">New password can not be same as old</font>';
    }else{

        $user = $_SESSION['id'];
        $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        db::instance()->action(
            "UPDATE users SET password = ?  WHERE username='$user'",
            array("$hashedPass")
        );
        header("Location: ./profile.php". "?user=".  $_SESSION['id']);

    }
}
require_once '../resources/templates/footer.php';
?>
