<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
if(session_status() == PHP_SESSION_NONE)
{
    session_start();//ANY TIME using session, even to get values, must start session
}
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/config/config.php");
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/controllers/main.php");

if(isset($_GET['ad']))
    $a = $_GET['ad'];
else
    $a = "no GET data";
echo $a;
?>
