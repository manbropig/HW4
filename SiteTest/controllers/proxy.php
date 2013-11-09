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
//echo $ad;


$url = "";
if($ad =="random")
{
    $url = "http://localhost/hw4/BestSiteAd/index.php/get-ad/?format=".$format;
}


$response = proxy_get($url);

//$response = preg_replace("/\r(?!\n)/", '', $response);

$response = utf8_encode($response);
//echo $response;
if($format=="json")
{
    //this creates an array out of the json
    $json_data = json_decode($response, true);

    $title = $json_data["title"];
    $desc = $json_data["desc"];
    $url = $json_data["url"];
//    $ad_space = "Advertisement:<br/>$title<br/>$desc<br/>$url<br/><br/>";

//    echo $ad_space;
}
else //xml case
{
    //this creates an object out of the xml
    $results = simplexml_load_string($response);

    $title = $results->adtitle;
    $desc = $results->addescription;
    $url = $results->adurl;
}
    //table needs formatting in CSS
    $table = <<<TBL
<table>
<caption>Advertisement</caption>
<tr>
<td>$title</td>
</tr>
<tr>
<td>$desc</td>
</tr>
<tr>
<td>$url</td>
</tr>
</table>
TBL;

echo $table;



function proxy_get( $url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}

?>
