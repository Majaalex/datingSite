
<?php
session_start();
require_once("../resources/config.php");
require_once "../resources/functions.php";
// Makes sure there are always values set and sorts based on previous options
if (!isset($_GET['female'])){
    $_GET['female'] = null;
}
if (!isset($_GET['male'])){
    $_GET['male'] = null;
}
if (!isset($_GET['other'])){
    $_GET['other'] = null;
}
if (isset($_GET['order'])){
    switch($_GET['order']){
        case 1:
            $order = 'salary ASC';
            break;
        case 2:
            $order = 'salary DESC';
            break;
        case 3:
            $order = 'firstname ASC';
            break;
        case 4:
            $order = 'firstname DESC';
            break;
        case 5:
            $order = 'lastname ASC';
            break;
        case 6:
            $order = 'lastname DESC';
            break;
    }
}
// Queries based on what the user has set in browse.php query
$count = db::instance()->count("SELECT * FROM users WHERE salary > ? AND salary < ? OR gender = ? OR gender = ? OR gender = ?",
    array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other']));
$array = db::instance()->get("SELECT * FROM users WHERE salary > ? AND salary < ? OR gender = ? OR gender = ? OR gender = ? ORDER BY $order",
    array($_GET['minSalary'], $_GET['maxSalary'] , $_GET['female'], $_GET['male'], $_GET['other']));

// Sames as browse.php, loops out all users in a neat table
require_once "browse_tbl_content.php";
