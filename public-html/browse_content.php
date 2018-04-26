
<?php
session_start();
echo "<table id='browse-tbl'>";
require_once("../resources/config.php");
require_once "../resources/functions.php";
$i = 0;

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
            echo "<li class='salary'>" . h($array[$i++]["salary"]) . "</li>";
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
?>
<script>
    // sets the currency variable for JS depending on the user is logged in, or to USD if there's nobody logged in
    <?php
    if(isset($_SESSION['id'])) {
    $user = DB::instance()->get("SELECT currency FROM users WHERE username = ?", array($_SESSION['id']));
    ?>
    var currency = '<?php echo $user[0]["currency"]; ?>'; <?php
    } else {
        if (!isset($_SESSION['id'])){
            echo "var currency = 'USD'";
        };
    }
    ?>

    // gets data from localstorage which is then used to convert the loaded data on the page to corresponding currency
    $(document).ready(function () {
        currency = $('#currencySelect').find(":selected").text();
        /*$.get('https://openexchangerates.org/api/latest.json', {app_id: '9d60f5c4e53c43898ee378509406c5c9'}, function (data) {
            var jsonData = JSON.stringify(data.rates);
            localStorage.setItem("openCurrency", jsonData);
        });*/
        var jsonRetrieveData = localStorage.getItem("openCurrency");
        jsonRetrieveData = JSON.parse(jsonRetrieveData);
        jsonRetrieveData = jQuery.makeArray(jsonRetrieveData);
        //goes through each li containing salary and updates the value
        $(".salary").each(function () {
            var text = $(this).text();
            var converted = text * jsonRetrieveData[0][currency];
            $(this).text(converted.toFixed(2) + " " + currency)
        })
    });
</script>
