
<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
session_destroy();
header("Location: ./browse.php");
?>
    <div id="container">
        <div id="content">
            <h1>logout</h1>
        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");