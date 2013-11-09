<script type="text/javascript">

    function requestAd()
    {
        //alert("page loaded");
        request = new XMLHttpRequest();
        //request.setRequestHeader("adName","value");

        var self = this;

        request.onreadystatechange = function()//handler function that should be run
        {
            if (request.readyState==4 )//will change based on response
            {
                document.getElementById("Advertisement").innerHTML = request.responseText;
            }
        }
        //need to include "controllers/" because actually being called from index.php
        request.open("GET","controllers/proxy.php?ad=random", false);
        request.send(null);
    }
</script>
<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");

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
     * @return string
     * Asks model for most recently added poems
     */
    function get_most_recent()
    {
        global $BASEURL;
        //get 10 most recent titles
        $rec_array = $this->puller->recent_query();

        //create links for each poem page
        $link = "$BASEURL". "index.php?view=landing&c=main&p=";
        $recent_list_str = "";
        foreach($rec_array as $ID => $title)
        {
            $recent_list_str .= "<a href=\"".$link.$ID."\">$title</a>
            <br/>";
        }
        return $recent_list_str;
    }

    function get_top_rated()
    {
        global $BASEURL;
        $top_array = $this->puller->top_query();

        //create links for each poem page
        $link = "$BASEURL". "index.php?view=landing&c=main&p=";
        $top_list_str = "";
        foreach($top_array as $ID => $title)
        {
            $top_list_str .= "<a href=\"".$link.$ID."\">$title</a>
            <br/>";
        }
        return $top_list_str;
    }
}
$ctrl = new controller();
?>

