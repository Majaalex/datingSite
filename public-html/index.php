
<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <?php echo url_for("index.php"); ?>
        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");