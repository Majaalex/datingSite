
<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$user = $_POST['username'];
$password = $_POST['password'];             //TODO PASSWORD HASHING
$email = $_POST['email'];
$postal = $_POST['postalCode'];
$about = $_POST['about'];
$salary = $_POST['salary'];
$currency = $_POST['currency'];
$gender = $_POST['gender'];

db::instance()->action(
    "INSERT INTO users (username, firstname, lastname, password, email, postal, about, salary, currency, gender) 
            VALUES (?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$password","$email", "$postal", "$about", "$salary", "$currency", "$gender" ));

require_once '../resources/templates/footer.php';
?>
