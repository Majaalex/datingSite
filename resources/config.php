<?php

/*
    The important thing to realize is that the config file should be included in every
    page of your project, or at least any page you want access to these settings.
    This allows you to confidently use these settings throughout a project because
    if something changes such as your database credentials, or a path to a specific resource,
    you'll only need to update it here.
*/

$config = array(
    "db" => array(
        "db1" => array(
            "dbname" => "datingsite",
            "username" => "root",
            "password" => "",
            "host" => "localhost"
        ),
        "db2" => array(
            "dbname" => "datingsite",
            "username" => "root",
            "password" => "",
            "host" => "localhost"
        )
    ),
    "urls" => array(
        "baseUrl" => "http://example.com"
    ),
    "paths" => array(
        "resources" => "../resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/img/layout"
        )
    )
);

/*
    I will usually place the following in a bootstrap file or some type of environment
    setup file (code that is run at the start of every page request), but they work
    just as well in your config file if it's in php (some alternatives to php are xml or ini files).
*/

/*
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "Paginator.php")
*/
defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public-html') + 12;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(-1);

require_once "functions.php";
require_once "db.php";