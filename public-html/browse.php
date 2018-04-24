<?php
// load up your config file
require_once("../resources/config.php");
require_once "../resources/functions.php";
require_once(TEMPLATES_PATH . "/header.php");

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div id="container">
    <div id="content">
        <h1>Browse</h1>
        <div id="filter-container">
            <div id="filter-content">
                <form id="browse-set">
            <table>
                <tr>
                    <td>
                        Searching for:<br>
                        <label for="male">Male:</label> <input type="checkbox" value="true" name="male"><br>
                        <label for="female">Female:</label> <input type="checkbox" value="true" name="female"><br>
                        <label for="other">Other:</label> <input type="checkbox" value="true" name="other"><br>
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
                            if (isset($_SESSION['id'])){
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
                                <option value="2000000">2 000 000+</option>
                        </select></label>
                        <label>
                            <?php
                            if (isset($_SESSION['id'])){
                                echo $curr[0]["currency"];
                            } else {
                                echo "USD";
                            }
                            ?>
                        </label>
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
        $id = 0;
        $array = db::instance()->get("SELECT * FROM users", array());
        $count = db::instance()->count("SELECT * FROM users", array("0"));
        echo "<div id='cont'>";
        echo "<div id='browse'>";
        echo "<table id='browse-tbl'>";

        // Loops out all requested values in a neat table format
        $i = 0;
        for ($row = 0; $row < $count / 5; $row++){
            echo "<tr>";
            for ($col = 0; $col < 5; $col++){
                if ($i < $count){
                    echo "<td class='browse'>";
                    echo "<div>";
                    echo "<ul>";
                    echo "<li><a href='" . url_for("profile.php"). "?user=".  h($array[$i]["username"])  . "'>" . h($array[$i]["username"]) . "</a></li>";
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
        echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>
<script>
    // sends form data as GET to browse_content.php, and returns it dynamically based on the filter options
    $(document).ready(function(){
        $("#filter-button").click(function(){
            var get_data = $('#browse-set').serialize();
            $("#browse").load("browse_content.php", get_data);

        });
    });
</script>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>

