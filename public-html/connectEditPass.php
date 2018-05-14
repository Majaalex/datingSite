<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

//if the form goes through HTML it will continue here
if (isset($_POST['save'])) {
    //Saving the POST variables
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $newPassCheck =$_POST['newPassCheck'];

    //Query to database to get old passwword
    $query = db::instance()->get("SELECT * FROM users WHERE username = ? ", array($_SESSION['id']));

    //Creating an error array to log out all the errors in testing
    $errorsArray = array();

    //Data validation in php
    //Check if password is valid
    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $newPass)){
        $pass_error = 'Password needs to be 8 characters long and contain a number and a letter. Cannot contain spaces';
        array_push($errorsArray, $pass_error);
    }
    //Checks it the old password matches
    if (!password_verify($oldPass, $query[0]['password'])) {
        $oldPass_error = 'Old password is incorrect';
        array_push($errorsArray, $oldPass_error);
    }
    //Check if the new passwords match each other
    if($newPass != $newPassCheck){
        $newPass_error = 'New password does not match';
        array_push($errorsArray, $newPass_error);
    }
    //Check if the new password is smae as the old
    if($oldPass == $newPass){
        $newPassSame_error = 'New password can not be same as old';
        array_push($errorsArray, $newPassSame_error);
    }

    if(count($errorsArray) > 0 ){
        //If there are errors, Do nothing
    }else{
        //Connect to database and user user in the database
        $user = $_SESSION['id'];
        $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
        db::instance()->action(
            "UPDATE users SET password = ?  WHERE username='$user'",
            array("$hashedPass")
        );
        //Redirect to profile page
        header("Location: ./profile.php". "?user=".  $_SESSION['id']);
    }
}
require_once '../resources/templates/footer.php';
?>
