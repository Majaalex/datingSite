<?php
// load up your config file
require_once("../resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <?php
            echo $_SESSION['id'];
            $query = db::instance()->get("SELECT * FROM users WHERE username = ?",array($_SESSION['id']));
            var_dump($query);
            ?>
            <table>
                <tr>
                    <td>
                        First Name & Last Name
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                </tr>
                <tr>
                    <td>
                        First Name & Last Name
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");