
<?php
// load up your config file
require_once("../resources/config.php");
require_once(TEMPLATES_PATH . "/header.php");
include("loginConnect.php");
?>
    <div id="container">
        <div id="content">
            <h1>login</h1>
        </div>
        <div class="centered">
                <!--Login form-->
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="username" placeholder="Username" value="<?php echo "$username"; ?>" required/><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="password" placeholder="Password" required/><br>
                            </td>
                        </tr>
                        <div <?php if (isset($pass_error)): ?> class="form_error" <?php endif ?> >
                            <?php if (isset($pass_error)): ?>
                            <span><?php echo $pass_error; ?></span>
                            <?php endif ?>
                        </div>
                    </table>
                    <input type="submit" value="LOGIN" name="login"/>
                </form>

        </div>
    </div>
<?php
require_once(TEMPLATES_PATH . "/footer.php");
