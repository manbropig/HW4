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
    var $title = "BestSiteAd";             //title of the page/view
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
        //$this->title = $ctrl->data['title'];//'<title>Poem Confirmation</title>';
        //$this->data['title'] = $this->title;
        //$this->data['css'] =  parent::css;
        //$this->data['recent'] = $this->recent;
        //$this->data['top'] = $this->top;
        $this->data["ad_form"] = $ctrl->data["ad_form"];
        $this->data["reset_link"] = $ctrl->data["reset_link"];
        $this->data["upload_link"] = $ctrl->data["upload_link"];
        $this->data["counter_lists"] = $ctrl->data["counter_lists"];
        //$this->data["author"] = $ctrl->data["author"];
        //$this->data["poem"] = $ctrl->data["poem"];
        //$this->data["poem_lists"] = $ctrl->data["poem_lists"];
        //$this->data["rand_link"] = $ctrl->data["rand"];
        //$this->data["starImage"] = $ctrl->data["starImage"];
        //$this->data["clickableStarImage"] = $ctrl->data["clickableStarImage"];
    }
}

$landing = new landing_view();
?>

<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head><script type="text/javascript" src="/HW4/BestSiteAd/js/formValidator.js"></script>
    <?php
    echo '<h1 class="siteTitle">
        <a href='.$BASEURL
    .' style="text-decoration:none">BestSiteAd</a> <br/>
    </h1>';
    ?>
    <title>BestSiteAd</title>
    <link rel="stylesheet" type="text/css" href="/HW4/BestSiteAd/css/limerick_styles.css"/>
</head>
<body>

<div class="upload">
    <?php echo $landing->data["reset_link"];?>
</div>
<div class="rand">
   <?php //echo $landing->data["rand_link"]; ?>
</div>
<table class="poem_holder">
    <tr>
        <th>List of Ads</th>
    </tr>
    <tr>
        <th><?php echo $landing->data["counter_lists"];?></th>
    </tr>
    <tr>
        <td class="poem"><?php //echo $landing->data["poem"];?></td>
    </tr>
</table>
<div>
        <br/>
Create new ad here:
        <?php echo $landing->data["ad_form"];?>

</div>

    <?php
        //echo $landing->data["poem_lists"];
    ?>
</body>

</html>
