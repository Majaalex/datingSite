<?php
// load up your config file
require_once("../resources/config.php");
require_once "../resources/functions.php";
require_once(TEMPLATES_PATH . "/header.php");
if (isset($_SESSION['id'])){
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div id="container">
    <div id="content">
        <h1>Browse</h1>
        <!-- Search bar form starts-->
        <div id="filter-container">
            <div id="filter-content">
                <form id="browse-set">
                    <table>
                        <tr>
                            <td>
                                Searching for:<br>
                                <label for="male">Male: <input type="checkbox" value="true" name="male" checked="checked"><br></label>
                                <label for="female">Female: <input type="checkbox" value="true" name="female" checked="checked"><br></label>
                                <label for="other">Other: <input type="checkbox" value="true" name="other" checked="checked"><br></label>
                            </td>
                            <td>

                                <label>Minimum salary:
                                    <select name="minSalary">
                                        <option value="0">0</option>
                                        <option value="500">500</option>
                                        <option value="1000">1 000</option>
                                        <option value="2500">2 500</option>
                                        <option value="5000">5 000</option>
                                        <option value="10000">10 000</option>
                                        <option value="25000">25 000</option>
                                        <option value="50000">50 000</option>
                                        <option value="100000">100 000</option>
                                        <option value="250000">250 000</option>
                                        <option value="500000">500 000</option>
                                        <option value="1000000">1 000 000</option>
                                    </select></label>
                                <label>
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $curr = db::instance()->get("SELECT currency FROM users WHERE username = ?", array($_SESSION['id']));
                                        echo $curr[0]["currency"];
                                    } else {
                                        echo "USD";
                                    }
                                    ?>
                                </label>
                            </td>
                            <td>
                                <label>Maximum salary:
                                    <select name="maxSalary">
                                        <option value="501">500</option>
                                        <option value="1001">1 000</option>
                                        <option value="2501">2 500</option>
                                        <option value="5001">5 000</option>
                                        <option value="10001">10 000</option>
                                        <option value="25001">25 000</option>
                                        <option value="50001">50 000</option>
                                        <option value="100001">100 000</option>
                                        <option value="250001">250 000</option>
                                        <option value="500001">500 000</option>
                                        <option value="1000001">1 000 000</option>
                                        <option value="2000001" selected="selected">2 000 000+</option>
                                    </select></label>
                                <label>
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        echo $curr[0]["currency"];
                                    } else {
                                        echo "USD";
                                    }
                                    ?>
                                </label>
                            </td>
                            <td>

                                <label>Minimum age:
                                    <select name="minAge">
                                        <option value="17" selected="selected">18</option>
                                        <option value="24">25</option>
                                        <option value="29">30</option>
                                        <option value="39">40</option>
                                        <option value="49">50</option>
                                        <option value="59">60</option>
                                    </select></label>
                            </td>
                            <td>
                                <label>Maximum age:
                                    <select name="maxAge">
                                        <option value="21">20</option>
                                        <option value="26">25</option>
                                        <option value="31">30</option>
                                        <option value="41">40</option>
                                        <option value="51">50</option>
                                        <option value="61" selected="selected">60+</option>
                                    </select></label>
                            </td>
                            <td>
                                <label>Order by:
                                    <select name="order">
                                        <option value="1" selected="selected">Salary ascending</option>
                                        <option value="2">Salary descending</option>
                                        <option value="3">First name ascending</option>
                                        <option value="4">First name descending</option>
                                        <option value="5">Surname ascending</option>
                                        <option value="6">Surname descending</option>
                                    </select></label>
                            </td>
                            <td>
                                <label>Select currency (Default is your account setting or USD):
                                    <select name="currency" id="currencySelect">

                                        // sets the currency variable for JS depending on the user is logged in, or to
                                        USD if there's nobody logged in
                                        <script>
                                            <?php
                                            if(isset($_SESSION['id'])) {
                                            $user = DB::instance()->get("SELECT currency FROM users WHERE username = ?", array($_SESSION['id']));
                                            ?>
                                            var currency = '<?php echo $user[0]["currency"]; ?>'; <?php
                                            } else {
                                                if (!isset($_SESSION['id'])) {
                                                    echo "var currency = 'USD'";
                                                };
                                            }
                                            ?>
                                        </script>

                                        <?php
                                        if (isset($_SESSION['id'])) {
                                            echo "<option selected='selected'>" . $user[0]["currency"] . "</option>";
                                        }
                                        require_once TEMPLATES_PATH . '/currency.html';
                                        ?>

                                    </select></label>
                            </td>
                            <td>
                                <input type="button" value="Search" id="filter-button">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php

        echo "<div id='cont'>";
        echo "<div id='browse'>";
        require_once "browse_tbl_content.php";
        echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>
<script>
    // sends form data as GET to browse_content.php, and returns it dynamically based on the filter options
    $(document).ready(function () {
        $("#filter-button").click(function () {
            var get_data = $('#browse-set').serialize()+ "&page=1";
            $("#browse").load("browse_tbl_content.php", get_data);
        });
    });


</script>

<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>

