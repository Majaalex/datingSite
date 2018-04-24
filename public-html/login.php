
<?php
// load up your config file
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
?>
    <div id="container">
        <div id="content">
            <h1>login</h1>
        </div>
        <div class="centered">

                <form action="loginConnect.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="username" placeholder="Username" required/><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="password" placeholder="Pssword" required/><br>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" value="LOGIN"/>
                </form>

        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");