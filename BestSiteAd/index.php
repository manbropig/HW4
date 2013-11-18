<?php
/*
 * This file will parse the URL to determine which controller to hand off to
 * and which method of that controller to be called.
 */
if(session_status() == PHP_SESSION_NONE)
{
    session_start();//ANY TIME using session, even to get values, must start session
}
error_reporting(-1);

include_once("config/config.php");

$method = get_method_name();
//echo $method."<br/>";

$c = "main.php";
$view = "landing.php";

if(isset($_REQUEST['c']))
    $c = $_REQUEST['c'].".php";

if(isset($_REQUEST['view']))
    $view = $_REQUEST['view'].".php";

if(isset($_REQUEST['c']))
{
        if($_REQUEST['c'] == "reset_controller")
        {
                $c = $_REQUEST['c'].".php";
        }

        if($_REQUEST['c'] == "delete_ad")
        {
                $c = $_REQUEST['c'].".php";
        }
    require_once('controllers/' . $c );
}


if($method != null)
{
    $c = 'ad_getter.php';
    require_once('controllers/' . $c );
}
else
{
//    echo $c . ' ' . $view;
    $base_html = <<<HTML
<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<!--
Jamie Tahirkheli - 006547398
Zohaib Khan - 007673133
CS 174
-->
<html xmlns="http://www.w3.org/1999/xhtml" id="backgrnd">
<head>
    <meta charset="utf-8">
</head>
<link rel="stylesheet" type="text/css" href="css/best_site_styles.css">

HTML;

    echo $base_html;

    require_once('controllers/' . $c );
    if($c != "delete_ad.php")
    require_once('views/' . $view );
    echo "</html>";
}



/**
 * Parses the url to get the method name.
 * This is probably a stupid way of doing it :(
 * @return string
 */
function get_method_name()
{
    $url =  $_SERVER["REQUEST_URI"];

    $target = "index.php/";
    if($pos = strpos($url, $target ))
    {
        $length =  strlen($target);
        $method_pos = $pos + $length;
        $method_start = substr($url, $method_pos); //gets beginning of method to end of url
        $method_string = preg_split("/[\/]/", $method_start);
        $method = $method_string[0];
        return $method;
    }
    else
        return null;

}
?>





