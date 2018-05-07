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
        <form method="post" action="profileEditPass.php" id="register_form">
            <h1>Change Password</h1>
            <div <?php if (isset($oldPass_error)): ?> class="form_error" <?php endif ?> >
                <input type="password" name="oldPass" placeholder="Old Password" required>
                <?php if (isset($oldPass_error)): ?>
                    <span><?php echo $oldPass_error; ?></span>
                <?php endif ?>
            </div>
            <div <?php if (isset($newPassSame_error)): ?> class="form_error" <?php endif ?> >                           <!--TODO kanske flytta error msgs-->
                <input type="password" name="newPass" placeholder="New Password" required>
                <?php if (isset($newPassSame_error)): ?>
                    <span><?php echo $newPassSame_error; ?></span>
                <?php endif ?>
            </div>
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