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
     * @return adds and their number of clicks
     */
    function get_ad_click_lists()
    {
        $clicks = $this->puller->click_query();
        return $clicks;
    }

    function setup()
    {
        global $BASEURL;

        $reset =
            "<a href="
            .$BASEURL."index.php?view=landing&c=reset_controller>
            Reset Counter</a>";
        $this->data["reset_link"] = $reset;
        $this->data["counter_lists"] = $this->puller->click_query();


//echo "setup complete";
    }
}


$ctrl = new controller();
$ctrl->setup();

//TODO parse url with $_SERVER["REQUEST_URI"] to get method_name.
?>

