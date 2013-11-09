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
        parent::__construct();

        if($method=="get-ad")
        {
            $details = $this->puller->get_rand_ad();
            //var_dump($details);
            //make an html table for the ad.

            $title = $details["title"];
            $desc = $details["desc"];
            $ad_table = "<table><caption>$title</caption><tr><td>$desc</td>
            </tr></table>";

            echo $ad_table;//this gets echoed in siteTest thanks to AJAX and proxy.php
        }

    }

function get_ad($format)
{
    //gets ad from puller
    //builds xml or json object depending on argument
    //returns xml or json document(string) OF that ad object

    echo "get_ad called <br/>";
    if($format == "JSON")
    {

    }
    else //format == xml
    {

    }
}



}
$getter = new Ad_Getter();



?>



