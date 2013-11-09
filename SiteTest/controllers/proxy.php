<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
if(session_status() == PHP_SESSION_NONE)
{
    session_start();//ANY TIME using session, even to get values, must start session
}
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

if(isset($_GET['ad']))
    $ad = $_GET['ad'];
else
    $ad = "no GET data";
echo $ad;


$url = "";
if($ad =="random")
{
    $url = "http://localhost/hw4/BestSiteAd/index.php/get-ad/";
}


echo proxy_get($url);

function proxy_get( $url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}

/*
 *
if you have a url and your php supports it, you could just call file_get_contents:

$response = file_get_contents('http://example.com/path/to/api/call?param1=5');
if $response is JSON, use json_decode to turn it into php array:

$response = json_decode($response);
if $response is XML, use simple_xml class:

$response = new SimpleXMLElement($response);
 */
//I think this should use http://localhost/hw4/BestSiteAd/index.php/method_name/?arg1=xxx...

?>
