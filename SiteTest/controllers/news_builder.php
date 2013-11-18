<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/controllers/proxy.php");

class news_builder extends proxy
{
    function __construct()
    {
        $article = $_GET['news'];
        $this->stories = $this->build_stories();
        echo $this->stories[$article - 1];
    }

    function build_stories()
    {
        $story1 = <<<one
<div>
    <h3>Bull Attacks Shopping Cart</h3>
    <p>
    At a local Target store a bull attacked a red shopping cart.<br/>
    Luckily there were no injuries. Apparently the bull was <br/>
    offended by the red color of the cart and the mockery of it's<br/>
    own species "eyes". This sent the bull into a charging rampage<br/>
    and left a shopping cart completely mangled.<br/>
    </p>
</div>
one;

        $story2 = <<<TWO
<div>
    <h3>Purple People Eaters May Exist</h3>
    <p>
    Maybe they do, maybe they don't...
    How should I know?<br/>
    Top class reporting! That's how! and in fact, it is most likely<br/>
    that they do not exist... At least in this universe/reality, but if<br/>
    the dimensions above our own, leading up to the tenth or eleventh<br/>
    dimension exist, than yes, Purple People eaters definitely DO exist.<br/>
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
    Though it has been popular belief that eating smaller meals<br/>
    more often over the course of the day helps with metabolism and<br/>
    staying healthy, apparently that doesn't work if you eat 10 small<br/>
    meals a day, one every 2 hours. Go figure.<br/>
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
    electronics alone which doesn't include whatever new Elmo doll<br/>
    is coming out along side the ps4 and XBOX 1. Apple and other big name<br/>
    electronic companies also have their releases ready and on the shelves<br/>
    to make sure to cash in on the holiday shopping frenzy yet to ensue<br/>
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
    This may mean creating a new type of road, or rolling the magnet under<br/>
    the vehicle itself. Critics say that this would basically defeat the <br/>
    purpose of such a vehicle and they are probably right.<br/>
    </p>
</div>
SIX;

        $story7 = <<<SVN
<div>
    <h3>Dog Marries Cat</h3>
    <p>
    7 year old Kayla Johnson held an official wedding for her dog<br/>
    and her cat. The bigger story here is that there<br/>
    apparently wasn't anything else to report on.<br/>
    The weather is nice and politics are politics as per usual so<br/>
    what we're saying is... we got nothin'.<br/>
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
    </p>
</div>
EIT;

        $story9 = <<<NIN
<div>
    <h3>Obama At Fault For WWII</h3>
    <p>
    Republicans and democrats alike are finding new ways to take childish<br/>
    shots at one another. One party, to be unnamed has found a link<br/>
    between world war II and the election of President Obama. According<br/>
    to an uncitable source, Obama is actually at fault for WWII.<br/>
    It's true! Just believe us...<br/>
    </p>
</div>
NIN;

        $story10 = <<<TEN
<div>
    <h3>Traffic Lights Adding New Color</h3>
    <p>
    The city of San Francisco has issued a bill that will ad a new color<br/>
    to the well known traffic light scheme. The color, officials say, will<br/>
    be blue, in order to really hit the nail on the head with the whole
    RGB<br/>
    spectrum. As far as what the light color will mean in terms of signals,
    <br/>
    officials have yet to decide, but a decision is promised within a week<br/>
    of the installation of the new traffic light color all around the city.<br/>
    </p>
</div>
TEN;
        $this->stories = [$story1,$story2,$story3,$story4,$story5,
            $story6,$story7,$story8,$story9,$story10];
        return $this->stories;
    }

}

//$builder = new ad_builder();

?>


