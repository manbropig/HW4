<!--
Jamie Tahirkheli
006547398
CS 174
-->
<?php
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/views/page.php");

class landing_view extends view
{
    var $title = "Loony Limericks - home";             //title of the page/view
    var $data = array();    //data to be displayed in the view
    var $recent = array();  //list of top 10 recently added poems - make display function
    var $top = array();     //list of top 10 rated poems - make display function
    var $featured;
    var $random;            //link to pick random poem from DB to be displayed

    function __construct()
    {
        $this->setup_page();
    }

    function setup_page()
    {
        global $ctrl;
        $this->title = $ctrl->data['title'];//'<title>Poem Confirmation</title>';
        $this->data['title'] = $this->title;
        $this->data['css'] =  parent::css;
        $this->data['recent'] = $this->recent;
        $this->data['top'] = $this->top;
        $this->data["upload_link"] = $ctrl->data["upload_link"];
        $this->data["author"] = $ctrl->data["author"];
        $this->data["poem"] = $ctrl->data["poem"];
        $this->data["poem_lists"] = $ctrl->data["poem_lists"];
        $this->data["rand_link"] = $ctrl->data["rand"];
        $this->data["starImage"] = $ctrl->data["starImage"];
        $this->data["clickableStarImage"] = $ctrl->data["clickableStarImage"];
    }
}

//$landing = new landing_view();
?>

<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Site Test</title>
</head>
<body onload="requestAd()">
<script type="text/javascript">

    function requestAd()
    {

        request = new XMLHttpRequest();
        //request.setRequestHeader("adName","value");

        request.open("POST","localhost/hw4/siteTest/controllers/proxy.php?ad=random", false);
        document.write("data sent");
        var self = this;

        request.onreadystatechange = function()//handler function that should be run
        {
            switch(request.readyState)//will change based on response
            {
                case 4:
                {
                    document.getElementById("Advertisement").innerHTML = request.responseText;
                }
            }
        }

        request.send(null);
    }
</script>

<div id="Advertisement">
    <?php
    /*
     * 10 news articles appearing in different order each time it loads.
     *
     * In the body tag there is an onload event (onload="requestAd()")
     * After 1st news article there is a blank div tag which will be filled in with an ad
     *
     *      this onload event calls a js function which makes a request to
     *      a proxy php script on SiteTest
     *
     *          This proxy php site calls webservice on BestSiteAd
     *          and gets an ad back
     *          return this ad to proxy that called it
     *
     *      proxy returns it to the js function that called it
     *
     * js function then receives the ad and puts it in the empty div tag
     */

    ?>
</div>
</body>


</html>
