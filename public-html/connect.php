
<?php
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

//Om allt gick bra, skriv trevligt meddlenade i konsolen
echo "Connection to the database was successful </br>";

//Förbered av ett kommando

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$user = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$postal = $_POST['postalCode'];
$about = $_POST['about'];
$salary = $_POST['salary'];

if (isset($_POST['genderM'])){
    $male = $_POST['genderM'];;
} else {
    $male = 0;
}
if (isset($_POST['genderF'])){
    $female = $_POST['genderF'];
} else {
    $female = 0;
}
if (isset($_POST['genderO'])){
    $other = $_POST['genderO'];
} else {
    $other = 0;
}
$check = db::instance()->count('SELECT * FROM datingsite WHERE username = ?', array($_POST['username']));
echo "$check";
if ($check == 1){
    $sql = "INSERT INTO users (username, firstname, lastname, password, email, postal, about, salary, searchMan, searchWoman, searchOther)
        VALUES ('$user', '$firstName', '$lastName', '$password','$email', '$postal', '$about', '$salary', '$male' , '$female', '$other')";
}



if($db->query($sql)){
    echo " New record was created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}


require_once '../resources/templates/footer.php';
?>
