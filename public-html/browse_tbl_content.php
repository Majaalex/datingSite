<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
require_once("../resources/config.php");
require_once "../resources/functions.php";
// Makes sure there are always values set and sorts based on previous options
if (isset($_GET['female'])) {
    $_GET['female'] = "female";
} else {
    $_GET['female'] = null;
}
if (isset($_GET['male'])) {
    $_GET['male'] = "male";
} else {
    $_GET['male'] = null;
}
if (isset($_GET['other'])) {
    $_GET['other'] = "other";
} else {
    $_GET['other'] = null;
}
if (isset($_GET['order'])) {
    switch ($_GET['order']) {
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
    }
}
if (isset($_SESSION['id'])) {
    // If a user is logged in, gets the users gender
    $preference = 0;
    $find = db::instance()->get("SELECT gender FROM users WHERE username = ?", array($_SESSION['id']));
    switch ($find[0]['gender']) {
        case "male":
            echo "male";
            $preference = 1;
            break;
        case "female":
            echo "female";
            $preference = 2;
            break;
        case "other":
            $preference = 4;
            break;
    }
}

// Gets the total # of results to input in the paginator
if (!isset($_GET['minSalary'])) {
    if (isset($_SESSION['id'])) {
        $count = initialCountQueryAll($preference);
    } else {
        $count = db::instance()->count("
        SELECT id 
        FROM users",
            array("0"));
    }
} else {
    if (isset($_SESSION['id'])) {
        $count = initialCountQueryFilter($preference);
    } else {
        $count = db::instance()->count("
        SELECT id 
        FROM users 
        WHERE salary > ? 
        AND salary < ? 
        AND (gender = ? OR gender = ? OR gender = ?)
        AND age > ?
        AND age < ?",
            array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
    }
}
$counter = 0;
$i = 0;
$divPageName = "page";

//  paginator current page setup
$rowsPerPage = 10;
// Makes sure a page shows if there's less than 10 results
if ($count < 11) {
    $totalPages = 1;
} else {
    $totalPages = ceil($count / $rowsPerPage) - 1;
}
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
if ($currentPage < 1) {
    $currentPage = 1;
}
$offset = ($currentPage - 1) * $rowsPerPage;
// paginator setup ends
if (!isset($_GET['minSalary'])) {
    $array = db::instance()->get("
SELECT * 
FROM users 
ORDER BY salary
LIMIT $rowsPerPage",
        array());
    $count = db::instance()->count("
SELECT * 
FROM users
LIMIT $rowsPerPage",
        array("0"));
} else {
    if (isset($_SESSION['id'])) {
        // If a user is logged in, gets the users gender
        $preference = 0;
        $find = db::instance()->get("SELECT gender FROM users WHERE username = ?", array($_SESSION['id']));
        switch ($find[0]['gender']) {
            case "male":
                echo "male";
                $preference = 1;
                break;
            case "female":
                echo "female";
                $preference = 2;
                break;
            case "other":
                $preference = 4;
                break;
        }
        $result = browseQuery($preference, $offset, $rowsPerPage, $order);
        $count = $result[0];
        $array = $result[1];
    } else {
        $count = db::instance()->count("
            SELECT id 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ?)
            AND age > ?
            AND age < ?
            LIMIT $offset, $rowsPerPage",
            array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));

        $array = db::instance()->get("
            SELECT firstname,lastname,username, email, salary,about 
            FROM users 
            WHERE salary > ? 
            AND salary < ? 
            AND (gender = ? OR gender = ? OR gender = ? )
            AND age > ?
            AND age < ?
            ORDER BY $order 
            LIMIT $offset, $rowsPerPage",
            array($_GET['minSalary'], $_GET['maxSalary'], $_GET['female'], $_GET['male'], $_GET['other'], $_GET['minAge'], $_GET['maxAge']));
    }
}
// Loads up all the content to be sent forward
for ($divPage = 0; $divPage < $totalPages; $divPage++) {
    $counter = 0;
    echo "<div id='$divPageName$divPage'>";
    echo "<table id='browse-tbl'>";
    // make rows
    for ($row = 0; $row < $count / 5; $row++) {
        echo "<tr>";
        // make columns
        for ($col = 0; $col < 5; $col++) {
            // makes sure we don't create more than 10 inputs per div
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
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
$range = 5;
echo "<div class='paginator'>";
if ($currentPage > 1) {
    // show << link to go back to page 1
    echo " <a href='$divPageName" . "1' class='page'><<</a> ";
    // get previous page num
    $prevpage = $currentPage - 1;
    // show < link to go back to 1 page
    echo " <a href='$divPageName" . "$prevpage' class='page'><</a> ";
} // end if

// loop to show links to range of pages around current page
for ($x = ($currentPage - $range); $x < (($currentPage + $range) + 1); $x++) {
    // if it's a valid page number...
    if (($x > 0) && ($x <= $totalPages)) {
        // if we're on current page...
        if ($x == $currentPage) {
            // 'highlight' it but don't make a link
            echo " [<b>$x</b>] ";
            // if not current page...
        } else {
            // make it a link
            $y = $x - 1;
            echo " <a href='$divPageName" . "$x' class='page'>$x</a> ";
        } // end else
    } // end if
} // end for

// if not on last page, show forward and last page links
if ($currentPage != $totalPages) {
    // get next page
    $nextpage = $currentPage + 1;
    // echo forward link for next page
    echo " <a href='$divPageName" . "$nextpage' class='page'>></a> ";
    // echo forward link for lastpage
    $lastPage = $totalPages - 1;
    echo " <a href='$divPageName" . "$totalPages' class='page'>>></a> ";
} // end if
echo "</div>";
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
        $("#browse").find('.page').on('click', function (e) {
            e.preventDefault();
            var $href = $(this).attr("href");
            var page = $href.substr(4);
            var get_data = $('#browse-set').serialize() + "&page=" + page;
            $("#browse").load("browse_tbl_content.php", get_data);
        })
    });


</script>
