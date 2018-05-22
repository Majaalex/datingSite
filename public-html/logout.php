
<?php
// load up your config file
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
session_destroy();                              //Destroy session, This will logout the user.
header("Location: ./browse.php");        //Redirects the user to the browse/main page
?>
    <div id="container">
        <div id="content">
            <h1>logout</h1>
        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");