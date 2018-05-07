<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';


if (isset($_POST['save'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $postal = $_POST['postalCode'];
    $about = $_POST['about'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];
    $currency = $_POST['currency'];
    $gender = $_POST['gender'];
    $prefMale = $_POST['genderM']; //TODO ISSET
    $preFemale = $_POST['genderF'];
    $prefOther = $_POST['genderO'];
    $preference = $prefMale + $preFemale + $prefOther;
                                                                                                                        //TODO COMMENT CODE

    $user = $_SESSION['id'];
        db::instance()->action(
            "UPDATE users SET firstname = ?, lastname = ?, email = ?, postal = ?, about = ?, age = ?, salary = ?, currency = ?, gender = ?, preference = ?  WHERE username='$user'",
                array("$firstName", "$lastName","$email", "$postal", "$about", "$age", "$salary", "$currency", "$gender", "$preference")
        );
        header("Location: ./profile.php". "?user=".  $_SESSION['id']);

}
require_once '../resources/templates/footer.php';
?>
