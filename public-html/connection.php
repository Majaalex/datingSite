
<?php
require_once '../resources/config.php';
require_once '../resources/templates/header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datingsite";

//Skapa Uppkopling
$db = new mysqli($servername,$username,$password,$dbname);
//Kolla att det går och kopplla sig, om ej skriv ut felet
if($db->connect_error){
    die("Something went wrong:" . $db->connect_error);
}

$firstName = "";
$lastName = "";
$user = "";
$email = "";
$about = "";

if (isset($_POST['signup'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $user = $_POST['username'];
    $pass = $_POST['password'];                         //TODO PASSWORD HASHING
    $passValidation =$_POST['passwordValidation'];
    $email = $_POST['email'];
    $postal = $_POST['postalCode'];
    $about = $_POST['about'];
    $salary = $_POST['salary'];
    $currency = $_POST['currency'];
    $gender = $_POST['gender'];


    $sql_user = "SELECT * FROM users WHERE username='$user'";
    $sql_email = "SELECT * FROM users WHERE email='$email'";
    $res_user = mysqli_query($db, $sql_user);
    $res_email = mysqli_query($db, $sql_email);

    if (mysqli_num_rows($res_user) > 0) {
        $name_error = "Username already taken";
    }else if($pass != $passValidation){
        $passValidation_error = "Password does not match";
    }else if(mysqli_num_rows($res_email) > 0){
        $email_error = "Email already in use";
    }else{
        db::instance()->action(
            "INSERT INTO users (username, firstname, lastname, password, email, postal, about, salary, currency, gender) 
            VALUES (?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$pass","$email", "$postal", "$about", "$salary", "$currency", "$gender" ));
        //TODO HEADER to main page
    }
}

require_once '../resources/templates/footer.php';
?>
