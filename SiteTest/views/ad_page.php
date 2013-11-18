<!--
Jamie Tahirkheli
006547398
CS 174
-->
<?php
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/controllers/ad_builder.php");

class linked_page
{
    function __construct()
    {
        $this->setup_page();
    }
    function setup_page()
    {
        if(isset($_REQUEST['title']))
            $t = $_REQUEST['title'];
        $title_string = urldecode($t);
        echo $title_string;
        $this->title = "<title>$title_string</title>";
        $this->data['css'] =  '<link rel="stylesheet"
        type="text/css" href="/HW4/siteTest/css/ad_styles.css"/>';
        $this->data['title'] = $this->title;

    }

    function display_page()
    {
        foreach($this->data as $d => $value)
        {
            echo $value;
        }
    }

}

?>

<html>
<?php
$view = new linked_page();
$view->display_page();
?>
<body>
<?php
//$builder = new ad_builder();
?>
</body>
</html>
