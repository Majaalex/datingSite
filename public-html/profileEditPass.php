<?php
require_once '../resources/config.php';
require_once '../resources/templates/header.php';
include('connectEditPass.php');
?>
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8">
    </head>

    <div class="centered">
        <!--A form for changing password-->
        <!--All the input fields follow the same principle as the first one-->
        <form method="post" action="profileEditPass.php" id="register_form">
            <h1>Change Password</h1>
            <!--OLD Password field-->
            <div <?php if (isset($oldPass_error)): ?> class="form_error" <?php endif ?> >
                <input type="password" name="oldPass" placeholder="Old Password" required>
                <?php if (isset($oldPass_error)): ?>
                    <span><?php echo $oldPass_error; ?></span>
                <?php endif ?>
                <div <?php if (isset($pass_error)): ?> class="form_error" <?php endif ?> >
                    <?php if (isset($pass_error)): ?>
                        <span><?php echo $pass_error; ?></span>
                    <?php endif ?>
                </div>
            </div>
            <!--Password field-->
            <div <?php if (isset($newPassSame_error)): ?> class="form_error" <?php endif ?> >
                <input type="password" name="newPass" placeholder="New Password" required>
                <?php if (isset($newPassSame_error)): ?>
                    <span><?php echo $newPassSame_error; ?></span>
                <?php endif ?>
            </div>
            <!--Password validation/check field-->
            <div <?php if (isset($newPass_error)): ?> class="form_error" <?php endif ?> >
                <input type="password" name="newPassCheck" placeholder="New Password" required>
                <?php if (isset($newPass_error)): ?>
                    <span><?php echo $newPass_error; ?></span>
                <?php endif ?>
            </div>
            <div>
                <input type="submit" value="Save" name="save"/>
            </div>
        </form>
    </div>

<?php
require_once '../resources/templates/footer.php';
?>