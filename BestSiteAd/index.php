<?php
/*
 * This file will parse the URL to determine which controller to hand off to
 * and which method of that controller to be called.
 */
if(session_status() == PHP_SESSION_NONE)
{
    session_start();//ANY TIME using session, even to get values, must start session
}
?>
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
<link rel="stylesheet" type="text/css" href="css/blogStyles.css">

<?php
include_once("config/config.php");

echo '<h1 class="siteTitle">
	<a href='.$BASEURL
    .' style="text-decoration:none">BestSiteAd</a> <br/>
	</h1>';

$method = get_method_name();

if($method =="get_ad")
{

}
$c = "main.php";
$view = "landing.php";

if(isset($_REQUEST['c']))
    $c = $_REQUEST['c'].".php";

if(isset($_REQUEST['view']))
    $view = $_REQUEST['view'].".php";

echo $c . ' ' . $view;
require_once('controllers/' . $c );
require_once('views/' . $view );





/**
 * Parses the url to get the method name.
 * This is probably a stupid way of doing it :(
 * @return string
 */
function get_method_name()
{
    $url =  $_SERVER["REQUEST_URI"];
    $target = "index.php/";
    $pos = strpos($url, $target );
    $length =  strlen($target);
    $method_pos = $pos + $length;
    $method_start = substr($url, $method_pos); //gets beginning of method to end of url
    $method_string = preg_split("/[\/]/", $method_start);
    $method = $method_string[0]."<br/>";
    return $method;
}
?>

</html>


