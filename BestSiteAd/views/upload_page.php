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

class upload_view extends view
{
    function __construct()
    {
        $this->setup_page();
    }


    function setup_page()
    {
        global $ctrl;
        $this->title = '<title>Poem Upload</title>';
        $this->data['title'] = $this->title;
        $this->data['css'] =  parent::css;
//        $this->data['recent'] = $this->recent;
//        $this->data['top'] = $this->top;
        $this->data["ad_form"] = $ctrl->data["ad_form"];
        //$this->data["poem_lists"] = $ctrl->data["poem_lists"];
    }

}

$uploader = new upload_view();
?>

<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <?php echo $uploader->data['title'];
    echo $uploader->data['css'];?>
</head>
<body>
<div class="enter">
    <?php echo $uploader->data["ad_form"];?>
</div>
<script type="text/javascript">

    /*
     Using Javascript you should verify the line lengths of
     title, author, and each line of the limerick before sending any
     data to the server. It should also check the number of lines in the poem.
     Accepted poem information should be stored in a database.
     */
    function validateForm()
    {
        var adForm = document.forms["adForm"];
        var title = adForm["title"].value;
        var URL = adForm["URL"].value;
        var desc = adForm["desc"].value;

        var ret = true;

        if (title==null || title=="" || title.length > 30)
        {
            alert("Title must be between 1 and 30 characters");
            ret = false;
        }

        if (URL==null || URL=="" || URL.length > 50)
        {
            {
                alert("URL must be between 1 and 50 characters");
                ret = false;
            }
        }

        if(desc==null || desc=="")
        {
            alert("Description can not be blank");
            ret = false;
        }

        return ret;
    }
</script>

<div><?php //echo $uploader->data["poem_lists"];?></div>
</body>

</html>
