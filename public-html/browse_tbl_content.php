<?php

$counter = 0;
$i = 0;
$divPageName = "page";
for ($divPage = 0; $divPage < $count / 10; $divPage++) {

    $counter = 0;
    echo $divPage == 0 ? "<div id='$divPageName$divPage'>" : "<div id='$divPageName$divPage' hidden>";
    echo "<table id='browse-tbl'>";
    for ($row = 0; $row < $count / 5; $row++) {
        echo "<tr>";
        for ($col = 0; $col < 5; $col++) {
            if ($i < $count && $counter < 10) {
                echo "<td class='browse'>";
                echo "<div>";
                echo "<ul>";
                echo "<li><a href='" . url_for("profile.php") . "?user=" . h($array[$i]["username"]) . "'>" . h($array[$i]["username"]) . "</a></li>";
                echo "<li>" . h($array[$i]["firstname"]) . " " . h($array[$i]["lastname"]) . "</li>";
                echo "<li>" . h($array[$i]["about"]) . "</li>";
                if (isset($_SESSION['id'])) {
                    echo "<li>" . h($array[$i]["email"]) . "</li>";
                }
                echo "<li class='salary'>" . h($array[$i++]["salary"]) . "</li>";
                $counter++;
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
    for ($j = 0; $j < $count / 10;){
        echo "<a href='$divPageName" . $j++ . "'> $j </a>";
    }
    echo "</div>";
}
?>
<script>
    $(document).ready(function () {
        /*if (localStorage.getItem("openCurrency") === null){
           $.get('https://openexchangerates.org/api/latest.json', {app_id: '9d60f5c4e53c43898ee378509406c5c9'}, function (data) {
                var jsonData = JSON.stringify(data.rates);
                localStorage.setItem("openCurrency", jsonData);
                console.log("Stored data in localstorage!");
            });
        }*/
        currency = $('#currencySelect').find(":selected").text();
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

    $(document).ready(function () {
        $('#browse').find('a').on('click', function (e) {
            e.preventDefault();
            $('#browse').children().hide();
            var $href = $(this).attr("href");
            $("#" + $href).show();
        })
    })
</script>
