<?php session_start();
if(isset($_SESSION['id'])){
    echo "WELCOME!";
}else{
    echo "you are not logged in";
}

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
<div id="header">
        <div id="left"><a href=<?php echo url_for("profile.php") ?>>Profile</a></div>
        <div id="center"><a href=<?php echo url_for("browse.php")?>>Browse</a></div>
        <div id="right"><a href=<?php echo url_for("login.php")?>>Login</a></div>
        <div id="right"><a href=<?php echo url_for("sign.php")?>>Sign up</a></div>
        <div id="right"><a href=<?php echo url_for("logout.php")?>>Log out</a></div>
</div>


