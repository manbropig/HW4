<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174

$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

class uploadAd extends controller
{

    function __construct()
    {
        parent::__construct();
        $this->setup();
    }

    public function setup()
    {
        global $BASEURL;


                $putter = new data_putter();


        if(isset($_POST["title"]) && isset($_POST["URL"]) && isset($_POST["desc"]))
        {
                $title = $_POST["title"];
                $URL = $_POST["URL"];
                $desc = $_POST["desc"];
                $data = ["title" =>$title,
                "URL" => $URL,
                "desc" => $desc];
                $putter-> upload_ad($data);
                echo '<meta http-equiv="refresh" content="0;url='
                    .$BASEURL.
                    'index.php?view=landing&c=main"/>';
        }


}
}
$ctrl = new uploadAd();
?>
