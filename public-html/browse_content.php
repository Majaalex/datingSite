
<?php
session_start();
echo "<table id='browse-tbl'>";
require_once("../resources/config.php");
require_once "../resources/functions.php";
$i = 0;

// Makes sure there are always values set
if (!isset($_GET['female'])){
    $_GET['female'] = null;
}
if (!isset($_GET['male'])){
    $_GET['male'] = null;
}
if (!isset($_GET['other'])){
    $_GET['other'] = null;
}

// Queries based on what the user has set in browse.php query
$count = db::instance()->count("SELECT * FROM users WHERE salary > ? AND salary < ? OR gender = ? OR gender = ? OR gender = ?",
    array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other']));
$array = db::instance()->get("SELECT * FROM users WHERE salary > ? AND salary < ? OR gender = ? OR gender = ? OR gender = ?",
    array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other']));

// Sames as browse.php, loops out all users in a neat table
for ($row = 0; $row < $count / 5; $row++){
    echo "<tr>";
    for ($col = 0; $col < 5; $col++){
        if ($i < $count){
            echo "<td class='browse'>";
            echo "<div>";
            echo "<ul>";
            echo "<li>" . h($array[$i]["username"]) . "</li>";
            echo "<li>" . h($array[$i]["firstname"]) . " " . h($array[$i]["lastname"]) . "</li>";
            echo "<li>" . h($array[$i]["about"]) . "</li>";
            if (isset($_SESSION['id'])){
                echo "<li>" . h($array[$i]["email"]) . "</li>";
            }
            echo "<li>" . h($array[$i++]["salary"]) . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "</td>";
        } else {
            break;
        }
    }
    echo "</tr>";
}
echo "</table>";
