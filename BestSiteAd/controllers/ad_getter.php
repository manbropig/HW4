<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

class Ad_Getter extends controller
{
    function __construct()
    {
        global $method;

        parent::__construct();

        if($method=="get-ad")
        {
            $format = $_REQUEST['format'];
            if(isset($_REQUEST['ad']))
                $details = $this->puller->get_ad($_REQUEST['ad']);
            else
                $details = $this->puller->get_rand_ad();
            if($format=="json")
            {
                $data = utf8_encode(json_encode($details));
                echo ($data);
            }
            else //xml case
            {
                echo $this->gen_xml($details);
            }

            //echo $ad_table;//this gets echoed in siteTest thanks to AJAX and proxy.php
        }
        else if($method=="increment-choice")
        {
            $id = $_REQUEST['id'];
            $this->putter->add_click($id);
//            echo "inc choice";
        }
        else if($method=="increment-vulnerable")
        {
            $id = $_REQUEST['id'];
            $query = $_REQUEST['q'];
            $this->putter->add_vulnerable($query,$id);
        }
        else if($method=="increment-news")
        {
            $this->putter->add_news_click();
        }
    }

    function gen_xml($details)
    {
        $id = $details['id'];
        $title = $details["title"];
        $desc = $details["desc"];
        $url = $details["url"];
        $clicks = $details['clicks'];

$xml = <<<XML
<!DOCTYPE ad SYSTEM "xml/ad.dtd" >
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



