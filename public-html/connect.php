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

if (isset($_POST['signup'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $user = $_POST['username'];
    $pass = $_POST['password'];                         //TODO PASSWORD HASHING
    $passValidation =$_POST['passwordValidation'];
    $email = $_POST['email'];
    $postal = $_POST['postalCode'];
    $about = $_POST['about'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $currency = $_POST['currency'];
    $gender = $_POST['gender'];
    $prefMale = $_POST['genderM'];
    $preFemale = $_POST['genderF'];
    $prefOther = $_POST['genderO'];
    $preference = $prefMale + $preFemale + $prefOther;

    $sql_user_pdo = db::instance()->count("SELECT * FROM users WHERE username = ?", array("$user"));
    $sql_email_pdo = db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email"));

    if (db::instance()->count("SELECT * FROM users WHERE username = ?", array("$user")) > 0) {
        $name_error = "Username already taken";
    }else if($pass != $passValidation){
        $passValidation_error = "Password does not match";
    }else if(db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email")) > 0){
        $email_error = "Email already in use";
    }else{
        //PASSWORD HASHING
        //$hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        db::instance()->action(
            "INSERT INTO users (username, firstname, lastname, password, email, postal, about, age, salary, currency, gender, preference) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$pass","$email", "$postal", "$about", "$age", "$salary", "$currency", "$gender", "$preference" ));
        header("Location: ./login.php");
        //TODO HEADER to main page
    }
}
require_once '../resources/templates/footer.php';
?>
