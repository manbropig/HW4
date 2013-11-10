<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");


/*
 *
*/
class incrementer extends controller
{
    function __construct()
    {
        $id = $_REQUEST['id'];
        parent::__construct();

        $this->putter->add_click($id);
    }


}
$incrementer = new incrementer();



?>



