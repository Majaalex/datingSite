<?php
// load up your config file
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <h1>login</h1>
        </div>
        <div>
            <form action="loginConnect.php" method="post">
        <pre>
            Username:           <input type="text" name="username" placeholder="Username" required/><br>
            Password:           <input type="password" name="password" placeholder="Pssword" required/><br>
            <input type="submit" value="LOGIN"/>
        </pre>
            </form>
        </div>

        <?php
        require_once(TEMPLATES_PATH . "/rightPanel.php");
        ?>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
?>