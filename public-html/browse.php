<?php
// load up your config file
require_once("../resources/config.php");
require_once "../resources/functions.php";
require_once(TEMPLATES_PATH . "/header.php");
?>
<div id="container">
    <div id="content">
        <h1>Browse</h1>
        <div class="filter">
            <table>
                <tr>
                    <td>
                        Searching for:
                        <label for="male">Male:</label>
                        <input type="checkbox" value="male" id="male">
                        <label for="female">Female:</label>
                        <input type="checkbox" value="female" id="female">
                        <label for="other">Other:</label>
                        <input type="checkbox" value="other" id="other">
                    </td>
                    <td>
                        <!-- This block can be reused as many times as needed -->
                        <div class="range-slider-div">
                            <section class="range-slider">
                                <span class="rangeValues"></span>
                                <input value="<?= $small = 0 ?>" min="0" max="300000" step="100" type="range">
                                <input value="<?= $big = 0 ?>" min="0" max="500000" step="500" type="range">
                            </section>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <?php
        $id = 0;
        $array = db::instance()->get("SELECT * FROM users", array());
        $count = db::instance()->count("SELECT * FROM users", array("0"));
        echo "<div id='cont'>";
        echo "<div id='browse'>";
        echo "<table id='browse-tbl'>";
        $i = 0;
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
        echo "</div>";
        ?>
    </div>
    <?php
    require_once(TEMPLATES_PATH . "/rightPanel.php");
    ?>
</div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>

<script>
    function getVals() {
        // Get slider values
        var parent = this.parentNode;
        var slides = parent.getElementsByTagName("input");
        var slide1 = parseFloat(slides[0].value);
        var slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            var tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        var displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = slide1 + " - " + slide2;
    }

    window.onload = function () {
        // Initialize Sliders
        var sliderSections = document.getElementsByClassName("range-slider");
        for (var x = 0; x < sliderSections.length; x++) {
            var sliders = sliderSections[x].getElementsByTagName("input");
            for (var y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
</script>