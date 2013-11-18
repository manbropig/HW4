<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
//if(session_status() == PHP_SESSION_NONE)
//{
//    session_start();//ANY TIME using session, even to get values, must start session
//}
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
            else if($method== "increment-news")
            {
                $this->inc_news();
            }
            //http://localhost/hw4/siteTest/controllers/proxy.php?method=increment-vulnerable&id=1
        }
    }

    function inc_ad()
    {
        global $longURL,$BASEURL;

        $id = $_GET["id"];
        $title = $_GET['title'];
        $link = "$longURL"."BestSiteAd/index.php/increment-choice/?id=".$id;
        $this->proxy_get($link);//web service request
        $url_title = urlencode($title);
        echo '<meta http-equiv="refresh" content="0; url='.
            $BASEURL.'SiteTest/views/ad_page.php?ad='
            .$id.'&title='.$url_title.'"/>';
    }

    function inc_news()
    {
        global $longURL,$BASEURL;
        $news = $_GET['news'];
        $link = "$longURL"."BestSiteAd/index.php/increment-news/";
        $this->proxy_get($link);//web service request

       echo '<meta http-equiv="refresh" content="0; url='.
            $BASEURL.'SiteTest/views/news_page.php?news='.$news.'"/>';
    }

    function inc_vuln()
    {
        global $longURL,$BASEURL;
        $id = $_GET["id"];
        $query = $_GET["q"];
        $q = urlencode($query);
        $link = "$longURL".
            "BestSiteAd/index.php/increment-vulnerable/?id=$id&q=$q";
        echo $this->proxy_get($link);
        echo '<meta http-equiv="refresh" content="0; url='.$BASEURL.
            'SiteTest/views/ad_page.php"/>';

    }
    function get_ad()
    {
        global $longURL, $format;
        $ad = $_GET['ad'];
        if($ad =="random")
            $url = "$longURL"."BestSiteAd/index.php/get-ad/?format=".$format;
        else
        {
//            echo $_GET['ad'];
            $title = $_GET['title'];
            $title = urlencode($title);
            $url="$longURL".
                "BestSiteAd/index.php/get-ad/?title=$title&ad=$ad&format=". $format;
        }
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

        /**
         * TO SEE INCREMENT-VULNERABLE IN ACTION:
         * paste
         * http://localhost/hw4/sitetest/controllers/proxy.php?method=increment-vulnerable&id=2&q=UPDATE+ADS+SET+DSCR+%3D+%22THIS+IS+A+HORRIBLE+PRODUCT%22%2C+CLICKS+%3D+
         * into the address bar
         * Then refresh sitetest's landing page
         * You will see that the advertisement is not always present.
         * You can change all of the ID's to super high numbers and not have
         * to see any advertisements
         */
$link_back =
    "<a href=\"controllers/proxy.php?".
    "method=increment-choice&id=$id&title=$title\">$url</a>";
//        $query = urlencode('UPDATE ADS SET CLICKS=');
//        $link_back = "<a href=\"controllers/proxy.php?method=increment-vulnerable&id=$id&q=$query\">$url</a>";

        //table needs formatting in CSS
        if($ad=="random")
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
        else
        {
            $table = <<<PGE
<table>
<caption>$title</caption>
<td>Welcome to the $title website!</td>
</tr>
<tr>
<td>$desc</td>
</tr>
<tr>
<td>To purchase this item, search for it on Amazon</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>Also if you know any web programmers, we could use some help...</td>
</tr>
</table>
PGE;

        }

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
