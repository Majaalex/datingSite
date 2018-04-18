<?php
require_once '../resources/config.php';
require_once '../resources/db.php';
require_once '../resources/templates/header.php';

$conn = mysqli_connect("localhost","root","","datingsite");

$user = $_POST['username'];
$password = $_POST['password'];             //TODO PASSWORD HASHING


$sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
$result = $conn->query($sql);

if(!$row = $result->fetch_assoc()){
    echo "Username or password is incorrect!";
}else{
    echo "You are logged in!";
    $_SESSION['id'] = $row['id'];
}

require_once '../resources/templates/footer.php';
?>
