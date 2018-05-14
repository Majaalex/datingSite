<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

//if the form goes through HTML it will continue here
if (isset($_POST['save'])) {
    //Saving the POST variables
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
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
        $preFemale = $_POST['genderF'];
    }else{
        $preFemale = 0;
    }
    if(isset($_POST['genderO'])){
        $prefOther = $_POST['genderO'];
    }else{
        $prefOther = 0;
    }
    //Adding the total of preference. The system we use is 1 = Male, 2 = Female, 4 = Other. All combinations of preference will be achieved with the numbers between 1-7
    $preference = $prefMale + $preFemale + $prefOther;

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
    //Check if email is valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailInvalid_error = "Email seems to be invalid";
        array_push($errorsArray, $emailInvalid_error);
    }
    //Check if email is already in use
    $query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($_SESSION['id']));
    if(db::instance()->count("SELECT * FROM users WHERE email = ?", array("$email")) > 0 and $email != $query[0]["email"]  ){
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
    if(!preg_match('/^.{10,138}$/',$about)){
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
    }else {
        //Connect to database and update user in the database
        $user = $_SESSION['id'];
        db::instance()->action(
            "UPDATE users SET firstname = ?, lastname = ?, email = ?, postal = ?, about = ?, age = ?, salary = ?, currency = ?, gender = ?, preference = ?  WHERE username='$user'",
            array("$firstName", "$lastName", "$email", "$postal", "$about", "$age", "$salary", "$currency", "$gender", "$preference")
        );
        //Redirect to profile page
        header("Location: ./profile.php" . "?user=" . $_SESSION['id']);
    }
}
require_once '../resources/templates/footer.php';
?>









