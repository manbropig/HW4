<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");

/*
 *
 */
class controller
{
    var $data = array(); //data to be echoed in views

    public function __construct()
    {
        $this->connector = new connector();
        $this->puller = new data_puller();
        $this->putter = new data_putter();
    }

    /**
     * Retrieves list of ads and corresponding clicks
     * @return ads and their number of clicks
     */
    function get_ad_click_lists()
    {
        global $BASEURL;
        $list = "<ul>";
        $result = $this->puller->click_query();

        for($i = 0; $i < sizeof($result[0]); $i++)
        {
                $list = $list . "<li>" . $result[0][$i] . " -- " . "<a href= ". $BASEURL . "index.php?c=delete_ad&i=" . $result[1][$i] . ">[DELETE]</a></li>";
        }
                $list = $list . "</ul>";

        return $list;
    }

    function setup()
    {
        global $BASEURL;

    $ad_input =  <<<AD
<form name='adForm' method="post" action="controllers/uploadAd.php"
onsubmit="return validateForm()">
                <input type="text" name="title"
                placeholder='Title'><br/>
                <input type="text" name="URL"
                placeholder='URL'>
                <br/>
                <textarea  id="desc" name="desc" rows="5" cols="35"
                placeholder='Type advertisement description here'></textarea>
                <br/>
                <input type="submit" value="Submit">
             </form>
AD;



        $reset =
            "<a href="
            .$BASEURL."controllers/reset_controller.php>
            Reset Counter</a>";
        $upload =
            "<a href="
            .$BASEURL."controllers/delete_ad.php>
            Upload Ad</a>";
        $this->data["ad_form"] = $ad_input;
        $this->data["reset_link"] = $reset;
        $this->data["upload_link"] = $upload;
        $this->data["counter_lists"] = $this->get_ad_click_lists();


//echo "setup complete";
    }
}


$ctrl = new controller();
$ctrl->setup();

//TODO parse url with $_SERVER["REQUEST_URI"] to get method_name.
?>



