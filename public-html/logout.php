<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <h1>logout</h1>
        </div>
        <?php
        require_once(TEMPLATES_PATH . "/rightPanel.php");
        ?>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>