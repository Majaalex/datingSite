<?php
// load up your config file
require_once("../resources/config.php");
require_once "../resources/functions.php";
require_once(TEMPLATES_PATH . "/header.php");

$id = isset($_GET['id']) ? h($_GET['id']) : '1';
echo $id;
?>
<div id="container">
    <div id="content">
        <h1>Browse</h1>
        <div class="filter">
                <pre>
                   Searching for: <select>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </pre>
            <!-- This block can be reused as many times as needed -->
            <section class="range-slider">
                <span class="rangeValues"></span>
                <input value="<?= $small = 0 ?>" min="0" max="300000" step="100" type="range">
                <input value="<?= $big = 0 ?>" min="0" max="500000" step="500" type="range">
            </section>
        </div>

        <?php $array = db::instance()->get("SELECT * FROM users", array("0"));
        foreach ($array as $a) {
            echo "<div class='browse'>";
            echo $a["username"] . "<br>";
            echo $a["firstname"] . " " . $a["lastname"] . "</br>";
            echo $a["about"] . "<br>";
            echo $a["salary"] . "<br>";
            echo "</div>";
        }
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