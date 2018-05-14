<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

//Creating starting values for the form when loading it for the first time
$firstName = "";
$lastName = "";
$user = "";
$email = "";
$postal = "";
$about = "";
$gender = "";
$currency = "USD";
$preference = 1;

//if the form goes through HTML it will continue here
if (isset($_POST['signup'])) {
    //Saving the POST variables
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
    //Checking if the preference isset
    if(isset($_POST['genderM'])){
        $prefMale = $_POST['genderM'];
    }else{
        $prefMale = 0;
    }
    if(isset($_POST['genderF'])){
        $prefFemale = $_POST['genderF'];
    }else{
        $prefFemale = 0;
    }
    if(isset($_POST['genderO'])){
        $prefOther = $_POST['genderO'];
    }else{
        $prefOther = 0;
    }
    //Adding the total of preference. The system we use is 1 = Male, 2 = Female, 4 = Other. All combinations of preference will be achieved with the numbers between 1-7
    $preference = $prefMale + $prefFemale + $prefOther;

    //Creating an error array to log out all the errors in testing
    $errorsArray = array();

    //Data validation in php
    //Check if first name only contains letters,',-.
    if(!preg_match("/^[a-zA-Z'-]+$/",$firstName)){
        $firstName_error = 'First name is invalid';
        array_push($errorsArray, $firstName_error);
    }
    //Check if last name only contains letters,',-.
    if(!preg_match("/^[a-zA-Z'-]+$/",$lastName)){
        $lastName_error = 'Last name is invalid';
        array_push($errorsArray, $lastName_error);
    }
    //Check if username exists
    if (db::instance()->count("SELECT * FROM users WHERE username = ?", array("$user")) > 0) {
        $name_error = 'Username already taken';
        array_push($errorsArray, $name_error);
    }
    //TODO IF USERNAME IS SHORTER THAN 4 chars
    //Check if password is valid
    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pass)){                                             //TODO ATM CANNOT CONTAIN SPECIAL CHARS, FIX? or fix error
        $pass_error = 'Password needs to be 8 characters long and contain a number and a letter. Cannot contain spaces or special characters';
        array_push($errorsArray, $pass_error);
    }
    //Check if password matches
    if($pass != $passValidation){
        $passValidation_error = 'Password does not match';
        array_push($errorsArray, $passValidation_error);
    }
    //Check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailInvalid_error = "Email seems to be invalid";
        array_push($errorsArray, $emailInvalid_error);
    }
    //Check if email is already in use
    if(db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email")) > 0){
        $emailInUse_error = 'Email already in use';
        array_push($errorsArray, $emailInUse_error);
    }
    //Check if postal code is valid, length
    if(strlen($postal) != 5){
        $postal_error = 'Enter a valid postal code';
        array_push($errorsArray, $postal_error);
    }
    //Check if postal code is valid, only numbers
    if(!preg_match('/^\d+$/',$postal)){
        $postalPreg_error = 'Please enter a valid postal code';
        array_push($errorsArray,$postalPreg_error);
    }
    //Checks that about me is long enough
    if(!preg_match('/^.{10}$/',$about)){
        $about_error = 'You need to write a bit more about yourself.';
        array_push($errorsArray, $about_error);
    }
    //Checks that user is not too young
    if($age < 18){
        $ageYoung_error = "This site is only for 18 or older";
        array_push($errorsArray,$ageYoung_error);
    }
    //Checks that user is not too old
    if($age > 150){
       $age_error = "You can't be that old";
       array_push($errorsArray,$age_error);
    }
    //Checks that the salary is a number
    if(!preg_match('/^\d+$/',$salary)){
        $salaryPreg_error = 'Please enter a valid salary';
        array_push($errorsArray,$salaryPreg_error);
    }

    if(count($errorsArray) > 0 ){
        //If there are errors, Do nothing
    }else{
        //PASSWORD HASHING, B-CRYPT
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        //Connect to database and insert new user into database
        db::instance()->action(
            "INSERT INTO users (username, firstname, lastname, password, email, postal, about, age, salary, currency, gender, preference) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$hashedPass","$email", "$postal", "$about", "$age", "$salary", "$currency", "$gender", "$preference" ));
        //Redirect to login page
        header("Location: ./login.php");
    }
}
require_once '../resources/templates/footer.php';
?>
