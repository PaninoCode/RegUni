<?php

$requestUri = $_SERVER['REQUEST_URI'];

if(strpos($requestUri, '?') !== false)
    $page = substr($requestUri, strrpos($requestUri, '?')+1);
else
    $page = substr($requestUri, strrpos($requestUri, '/')+1);

switch ($page) {
    case "":
        include("content/home.php");
        break;
    case "login":
        include("content/login.php");
        break;
    case "activities":
        include("content/activities.php");
        break;
    case "activities/edit":
        include("content/activities-edit.php");
        break;
    case "units":
        include("content/units.php");
        break;
    case "units/edit":
        include("content/units-edit.php");
        break;
    default:
        include("content/error-404.php");
        break;
}
?>