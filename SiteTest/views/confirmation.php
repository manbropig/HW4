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

class linked_page extends view
{
    function __construct()
    {
        $this->setup_page();
    }
    function setup_page()
    {
        global $usher;
        $this->title = '<title>Poem Confirmation</title>';
        $this->data['css'] =  '<link rel="stylesheet"
        type="text/css" href="/HW3/css/limerick_styles.css"/>';
        $this->data['message'] = $usher->message;
        $this->data['redirect'] = $usher->redirect;
        $this->data['title'] = $this->title;
    }

    function display_page()
    {
        foreach($this->data as $value)
        {
            echo $value;
        }
    }

}
//TODO figure out why not redirecting properly
?>

<body>
<?php
$view = new linked_page();
$view->display_page();

echo 'I think we can try and pass the entire mysql query<br/>for the increment-vulnerable method like this:<br/><br/>';
$string = "UPDATE table_name SET CLICKS = 5 where ID = 2";
echo urlencode($string);
echo '<br/>'.urldecode($string). '<br/><br/>';
?>

<br/>
I think this page should have the ad?.. or something...<br/>
And then if a news article was clicked I guess this should have the story.<br/>

Or we could have a separate page for news articles. I don't think it matters.<br/>
Whatever is easier<br/>
<br/><br/>
Or just a pug in a swing<br/>
<img src="http://thechive.files.wordpress.com/2013/11/funny-animals-19.jpg"/>

</body>

