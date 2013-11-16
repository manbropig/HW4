<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

class uploader extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->setup();
    }

    public function setup()
    {
        parent::setup();

    $ad_input =  <<<AD
<form name='adForm' method="post" action="controllers/uploadAd.php"
onsubmit="return validateForm()">
                <input class="submit" type="text" name="title"
                placeholder='Title'><br/>
                <input class="submit" type="text" name="URL"
                placeholder='URL'>
                <br/>
                <textarea  id="desc" name="desc" rows="5" cols="35"
                placeholder='Type advertisement description here'></textarea>
                <br/>
                <input type="submit" value="Submit">
             </form>
AD;

        $this->data["ad_form"] = $ad_input;

    }
}
$ctrl = new uploader();
?>

