<?php
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
require_once("../resources/config.php");
require_once "../resources/functions.php";
// GET VARIABLE CHECKS
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
} // GET VARIABLE CHECKS ENDS

// If a session is active, gets the users gender to be used in filtering
if (isset($_SESSION['id'])) {
    $preference = 0;
    // query for the gender
    $find = db::instance()->get("SELECT gender FROM users WHERE username = ?", array($_SESSION['id']));
    // preference is a number system where 1 is male, 2 is female, 4 is other, added together if multiple preferences
    switch ($find[0]['gender']) {
        case "male":
            $preference = 1;
            break;
        case "female":
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
        // returns same query as row 71 below with preference added to the query
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
//  paginator current page setup
// CHANGE THIS # TO SET AMOUNT OF USERS SHOWN PER PAGE
$rowsPerPage = 10;
// Makes sure a page shows if there's less than 10 results
if ($count < 11) {
    $totalPages = 1;
} else {
    $totalPages = ceil($count / $rowsPerPage) - 1;
}
// if page is set and a number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}
// page count can't be higher than max amount of pages
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
// page count can't go to 0 or less
if ($currentPage < 1) {
    $currentPage = 1;
}
// offset to be used in MYSQL queries
$offset = ($currentPage - 1) * $rowsPerPage;
// paginator setup ends

// QUERY SECTION:  updates $count and creates $array, so the page content can be loaded
// Initial query when browse is loaded
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
    // And if content is just beign reloaded on IE page change or filter uppdate
    // Session is checked, and preference is taken into consideration
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
    // However if no user is logged in, it shows all users
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
} // QUERY SECTION ENDS

// Index for which user to print
$i = 0;
$divPageName = "page";


// MAIN PAGE CONTENT: Loads up all the content to be sent forward
for ($divPage = 0; $divPage < $totalPages; $divPage++) {
    // Sets a counter to limit amount of users
    $counter = 0;
    echo "<div id='$divPageName$divPage'>";
    echo "<table id='browse-tbl'>";
    // make rows
    for ($row = 0; $row < $count / 5; $row++) {
        echo "<tr>";
        // make columns
        for ($col = 0; $col < 5; $col++) {
            // makes sure we don't create more than 10 inputs per div
            if ($i < $count && $counter < $rowsPerPage) {
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
            } // end if
        } // end for col
        echo "</tr>";
    } // end for row
    echo "</table>";
    echo "</div>";
} // MAIN PAGE CONTENT ENDS

// PAGINATOR CONTENT: printing out all links for page navigation
// Change this number to adjust amount of pages to either side shown
$range = 3;
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
    // Function to convert values to whatever is set in the filter
    $(document).ready(function () {
        // if user has no currency rates, they will be set
        if (localStorage.getItem("openCurrency") === null){
            // Queries openechangerates for the latest curreny exchange rates
           $.get('https://openexchangerates.org/api/latest.json', {app_id: '9d60f5c4e53c43898ee378509406c5c9'}, function (data) {
                var jsonData = JSON.stringify(data.rates);
                // And stores the ratios in localstorage
                localStorage.setItem("openCurrency", jsonData);
                console.log("Stored data in localstorage!");
            });
        }
        // Gets the selected currency
        currency = $('#currencySelect').find(":selected").text();
        // Gets the currency ratio from localstorage
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
    // Reloads the page content when page link is clicked
    $(document).ready(function () {
        $("#browse").find('.page').on('click', function (e) {
            e.preventDefault();
            // Gets page number
            var $href = $(this).attr("href");
            // Strips page from the string
            var page = $href.substr(4);
            var get_data = $('#browse-set').serialize() + "&page=" + page;
            // Send data from filter + page# and load a new page
            $("#browse").load("browse_tbl_content.php", get_data);
        })
    });
</script>
