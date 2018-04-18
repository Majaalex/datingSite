
<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$user = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$postal = $_POST['postalCode'];
$about = $_POST['about'];
$salary = $_POST['salary'];
$male = $_POST['genderM'];;
$female = $_POST['genderF'];
$other = $_POST['genderO'];

db::instance()->action(
    "INSERT INTO users (username, firstname, lastname, password, email, postal, about, salary, searchMan, searchWoman, searchOther) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?)", array("$user", "$firstName", "$lastName", "$password","$email", "$postal", "$about", "$salary", "$male" , "$female", "$other"));

require_once '../resources/templates/footer.php';
?>
