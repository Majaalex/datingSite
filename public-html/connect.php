<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

$firstName = "";
$lastName = "";
$user = "";
$email = "";
$about = "";
$gender = "";
$currency = "USD";
                                                                                                                        //TODO COMMENT CODE
if (isset($_POST['signup'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $passValidation =$_POST['passwordValidation'];
    $email = $_POST['email'];
    $postal = $_POST['postalCode'];
    $about = $_POST['about'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $currency = $_POST['currency'];
    $gender = $_POST['gender'];
    if(isset($_POST['genderM'])){
        $prefMale = $_POST['genderM'];
    }else{
        $prefMale = 0;
    }
    if(isset($_POST['genderf'])){
        $prefFemale = $_POST['genderF'];
    }else{
        $prefFemale = 0;
    }
    if(isset($_POST['genderO'])){
        $prefOther = $_POST['genderO'];
    }else{
        $prefOther = 0;
    }

    $preference = $prefMale + $prefFemale + $prefOther;

    $sql_user_pdo = db::instance()->count("SELECT * FROM users WHERE username = ?", array("$user"));
    $sql_email_pdo = db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email"));

    if (db::instance()->count("SELECT * FROM users WHERE username = ?", array("$user")) > 0) {
        $name_error = '<font color="red">Username already taken</font>';                                                                         //TODO change to css
    }else if($pass != $passValidation){
        $passValidation_error = '<font color="red">Password does not match</font>';
    }else if(db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email")) > 0){
        $email_error = '<font color="red">Email already in use</font>';
    }else{
        //PASSWORD HASHING
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        db::instance()->action(
            "INSERT INTO users (username, firstname, lastname, password, email, postal, about, age, salary, currency, gender, preference) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$hashedPass","$email", "$postal", "$about", "$age", "$salary", "$currency", "$gender", "$preference" ));
        header("Location: ./login.php");
        //TODO HEADER to main page
    }
}
require_once '../resources/templates/footer.php';
?>
