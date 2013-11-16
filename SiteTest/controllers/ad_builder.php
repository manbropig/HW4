<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/controllers/proxy.php");

class ad_builder extends proxy
{
    function __construct()
    {

        parent::get_ad();
    }

}

//$builder = new ad_builder();

?>


