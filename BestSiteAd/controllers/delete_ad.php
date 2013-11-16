<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174

$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

class delete extends controller
{
    function __construct()
    {
        parent::__construct();
        $this->setup();
    }

    public function setup()
    {
        global $BASEURL;

        if(isset($_REQUEST['i']))
        $i = $_REQUEST['i'];

                $connection = new connector();
                $connection-> delete_ad($i);


                echo '<meta http-equiv="refresh" content="0;url='
                    .$BASEURL.
                    'index.php?view=landing&c=main"/>';
}
}
$ctrl = new delete();
?>
