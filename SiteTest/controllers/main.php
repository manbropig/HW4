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
//        $this->story_string = $this->build_story_string();
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
    <h3>Bull Attacks Shopping Cart</h3>
    <p>
    At a local Target store a bull attacked a red shopping cart.
    Luckily there were no injuries...<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
one;

        $story2 = <<<TWO
<div>
    <h3>Purple People Eaters May Exist</h3>
    <p>
    Maybe they do, maybe they don't...
    How should I know?<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
TWO;

        $story3 = <<<THR
<div>
    <h3>Eating 10X a day may not be good for you</h3>
    <p>
    According to research, those who eat more than<br/>
    10 meals a day seem to be developing health problems<br/>
    such as obesity and heart disease. These people<br/>
    also seem to have very low IQs.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
THR;

        $story4 = <<<FOUR
<div>
    <h3>Could investing in education be the right move?</h3>
    <p>
    Contrary to Fox news, investing in education may lead<br/>
    to better people in general. Learning about the world<br/>
    and new perspectives, along with ethics and how to make<br/>
    well informed decisions MIGHT lead to a better world in general.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
FOUR;

        $story5 = <<<FVE
<div>
    <h3>Black Friday Approaches</h3>
    <p>
    Stores are preparing their staff for the oncoming chaos!<br/>
    "Winter is coming" as they are now saying, and so is Black Friday<br/>
    and shoppers are expected to be spending 200 million dollars on<br/>
    soap alone<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
FVE;

        $story6 = <<<SIX
<div>
    <h3>Hover Car Invented</h3>
    <p>
    New hover car has been invented using superconductors and magnets!<br/>
    So far the cars are restricted to stay on superconducting tracks<br/>
    But scientists hope to find a work around soon.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
SIX;

        $story7 = <<<SVN
<div>
    <h3>Dog Marries Cat</h3>
    <p>
    7 year old Kayla Johnson held an official wedding for her dog<br/>
    and her cat. The bigger story here is that there<br/>
    apparently wasn't anything else to report on<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
SVN;

        $story8 = <<<EIT
<div>
    <h3>Lion goes Vegetarian</h3>
    <p>
    Leelo the lion has announced that he will be going vegetarian.<br/>
    As reports of this spread, gazelles everywhere have started<br/>
    celebrate, but speculators are still concerned and keeping their<br/>
    distance.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
EIT;

        $story9 = <<<NIN
<div>
    <h3>Obama At Fault For WWII</h3>
    <p>
    Contrary to Fox news, investing in education may lead<br/>
    to better people in general. Learning about the world<br/>
    and new perspectives, along with ethics and how to make<br/>
    well informed decisions MIGHT lead to a better world in general.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
NIN;

        $story10 = <<<TEN
<div>
    <h3>Traffic Lights Adding New Color</h3>
    <p>
    Contrary to Fox news, investing in education may lead<br/>
    to better people in general. Learning about the world<br/>
    and new perspectives, along with ethics and how to make<br/>
    well informed decisions MIGHT lead to a better world in general.<br/>
    "<a href="localhost/">read more</a>"
    </p>
</div>
TEN;


        $ad = <<<AD
<div id="Advertisement">
</div>
AD;

        $this->stories = [$story1,$ad,$story2,$story3,$story4,$story5,
        $story6,$story7,$story8,$story9,$story10];
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

        array_splice($this->stories,1,0,$insert);
        //var_dump($this->stories);
    }

    function build_story_string()
    {
        $string = "";
        for($i = 0; $i < sizeof($this->stories) ; $i++)
        {
            $string .= $this->stories[$i];
        }
        return $string;
    }
}
$ctrl = new controller();
?>

