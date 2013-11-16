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

class proxy extends controller
{
    function __construct()
    {
        parent::__construct();

        if(isset($_GET['ad']))
            $this->get_ad();
        else if(isset($_GET['method']))
        {
            $method = $_GET['method'];
            if($method == "increment-choice")
                $this->inc_ad();
            else if($method == "increment-vulnerable")
                $this->inc_vuln();
            //http://localhost/hw4/siteTest/controllers/proxy.php?method=increment-vulnerable&id=1
        }
    }

    function inc_ad()
    {
        global $longURL,$BASEURL;

        $id = $_GET["id"];
        $link = "$longURL"."BestSiteAd/index.php/increment-choice/?id=".$id;
        $this->proxy_get($link);//web service request
        echo '<meta http-equiv="refresh" content="0; url='.$BASEURL.'SiteTest/views/confirmation.php"/>';
    }


    function inc_vuln()
    {
        global $longURL,$BASEURL;
        $id = $_GET["id"];
        $query = urlencode('UPDATE ADS SET CLICKS=');
        echo $query . "<br/>";
        $link = "$longURL"."BestSiteAd/index.php/increment-vulnerable/?q=$query&id=$id";
        echo $this->proxy_get($link);
//        echo '<meta http-equiv="refresh" content="0; url='.$BASEURL.'SiteTest/views/confirmation.php"/>';

    }
    function get_ad()
    {
        global $longURL, $format;
        $url = "";
        $ad = $_GET['ad'];
        if($ad =="random")
            $url = "$longURL"."BestSiteAd/index.php/get-ad/?format=".$format;

        $response = $this->proxy_get($url);
        $response = utf8_encode($response);
        if($format=="json")
        {
            //this creates an array out of the json
            $json_data = json_decode($response, true);

            $title = $json_data["title"];
            $desc = $json_data["desc"];
            $url = $json_data["url"];
            $id = $json_data["id"];
        }
        else //xml case
        {
            //this creates an object out of the xml
            $results = simplexml_load_string($response);
                //echo $response;
            $title = $results->adtitle;
            $desc = $results->addescription;
            $url = $results->adurl;
            $id = $results->adid;
        }
        $link_back = "<a href=\"controllers/proxy.php?method=increment-choice&id=$id\">$url</a>";

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
<td>$link_back</a></td>
</tr>
</table>
TBL;

        echo $table;

    }

    function proxy_get($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl, CURLOPT_PORT, 8080);
        return curl_exec($curl);
    }
}

$proxy = new proxy();





?>
