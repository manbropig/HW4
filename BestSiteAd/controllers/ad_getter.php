<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");


/*
 *
*/
class Ad_Getter extends controller
{
    function __construct()
    {
        global $method;

        $format = $_REQUEST['format'];
        parent::__construct();

        if($method=="get-ad")
        {
            $details = $this->puller->get_rand_ad();
            //var_dump($details);
            //make an html table for the ad.

            $id = $details['id'];
            $title = $details["title"];
            $desc = $details["desc"];
            $url = $details["url"];

            if($format=="json")
            {
                $data = utf8_encode(json_encode($details));
                echo ($data);
//                var_dump($data);
            }
            else //xml case
            {
//                var_dump($details);
                echo $this->gen_xml($details);
            }
            $ad_table = "<table><caption>$title</caption><tr><td>$desc</td>
            </tr></table>";

            //echo $ad_table;//this gets echoed in siteTest thanks to AJAX and proxy.php
        }
    }

    function gen_xml($details)
    {
        $id = $details['id'];
        $title = $details["title"];
        $desc = $details["desc"];
        $url = $details["url"];
        $clicks = $details['clicks'];

        //<?xml version="1.0" encoding="utf-8"
//        <!DOCTYPE ad "ad.dtd" >
$xml = <<<XML
<ad>
    <adid>$id</adid>
    <adtitle>$title</adtitle>
    <adurl>$url</adurl>
    <addescription>$desc</addescription>
    <adclicks>$clicks</adclicks>
</ad>
XML;

        return $xml;
    }
}
$getter = new Ad_Getter();



?>



