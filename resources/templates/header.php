<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Simple Site</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/datingsite/public-html/css/style.css">
</head>

<body>
<div id="menu">
<table id="menu-tbl">
    <tr>
        <td>
            <ul>
                <?php if (isset($_SESSION['id'])){
                    echo "<li><a href =" . url_for("profile.php"). "?=" .  h($_SESSION['id'])  . ">" . h($_SESSION['id']) . "</a></li>";
                } ?>
                <li><a href=<?php echo url_for("browse.php")?>>Browse</a></li>
            </ul>
        </td>
        <td>
            <ul>
                <?php if (!isset($_SESSION['id'])){
                    echo "<li><a href =" . url_for("login.php") . ">Login</a></li>";
                    echo "<li><a href =" . url_for("signup.php") . ">Sign up</a></li>";
                } elseif (isset($_SESSION['id'])) {
                    echo "<li><a href =" . url_for("logout.php") . ">Log out</a></li>";
                }
                ?>
            </ul>
        </td>
    </tr>
    <tr>

    </tr>
</table>
</div>
