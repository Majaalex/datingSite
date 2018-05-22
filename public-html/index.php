
<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <?php header("Location: ./browse.php") ?>
        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
