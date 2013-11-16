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
if(session_status() == PHP_SESSION_NONE)
{
    session_start();//ANY TIME using session, even to get values, must start session
    $_SESSION['count'] = 0;
}
error_reporting(-1);
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");

class controller
{
    var $stories = array(); //stories

    public function __construct()
    {
        $this->connector = new connector();
        $this->puller = new data_puller();
        $this->putter = new data_putter();
        $this->save_stories();
        $this->change_story_order();
        $this->story_string = $this->build_story_string();;
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

    function save_stories()
    {
        $story1 = <<<one
<div>
    Story number 1
    <p>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    end of story.
    </p>
</div>
one;

        $story2 = <<<TWO
<div>
    Story number 2
    <p>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    end of story.
    </p>
</div>
TWO;

        $story3 = <<<THR
<div>
    Story number 3
    <p>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    end of story.
    </p>
</div>
THR;

        $story4 = <<<FOUR
<div>
    Story number 4
    <p>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    end of story.
    </p>
</div>
FOUR;

        $ad = <<<AD
<div id="Advertisement" style="background-color:#EDE275">
</div>
AD;

        $this->stories = [$story1, $ad, $story2, $story3, $story4];
}


    function change_story_order()
    {
        $order = ++$_SESSION['count'];
        $ad = $this->stories[1];
        $insert = array($ad);
        for($i = 0; $i < $order; $i++)
        {
            $story = array_shift($this->stories);
            $this->stories[] = $story;
        }
        if (($key = array_search($ad, $this->stories)) !== false) {
            unset($this->stories[$key]);
        }

        array_splice($this->stories,0,1,$insert);
    }

    function build_story_string()
    {
        $string = "";
        for($i = 0; $i < sizeof($i) ; $i++)
        {
            $string .= $this->stories[$i];
        }
        return $string;
    }
}
$ctrl = new controller();
?>

