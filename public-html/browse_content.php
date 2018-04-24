<?php
echo "<table id='browse-tbl'>";
require_once("../resources/config.php");
require_once "../resources/functions.php";
$i = 0;

echo "bloooppererererererer";
$array = db::instance()->get("SELECT * FROM users", array());
$count = db::instance()-> count("SELECT * FROM users", array("0"));
for ($row = 0; $row < $count / 5; $row++){
    echo "<tr>";
    for ($col = 0; $col < 5; $col++){
        if ($i / 5 <= 1){
            echo "<td class='browse'>";
            echo "<div>";
            echo "<ul>";
            echo "<li>" . $array[$i]["username"] . "</li>";
            echo "<li>" . $array[$i]["firstname"] . " " . $array[$i]["lastname"] . "</li>";
            echo "<li>" . $array[$i]["about"] . "</li>";
            echo "<li>" . $array[$i++]["salary"] . "</li>";
            echo "</ul>";
            echo "</div>";
            echo "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
echo "</div>";
?>
