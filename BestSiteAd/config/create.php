<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174
$parent_dir = dirname(__FILE__) . '/..';
include_once($parent_dir . "/models/db_con.php");
include_once($parent_dir . "/config/config.php");



/*
 * An advertisement has at a minimum an Ad ID, a title, URL to go find out more about that product, and a description.
 * On the server a particular ad should be stored in a database and you should make use of a model to read it.
 */

$connector = new connector();
$putter = new data_putter();
$connector->drop_table($table_name);
$connector->drop_db($db_name);
$connector->create_db($db_name);
$connector->choose_db($db_name);
$table_maker = "CREATE TABLE IF NOT EXISTS $table_name
    (ID INTEGER(3) NOT NULL AUTO_INCREMENT,
    TITLE VARCHAR(30),
    URL VARCHAR(50),
    DSCR VARCHAR(200),
    CLICKS INTEGER(3),
    PRIMARY KEY (ID))";

$connector->create_table($table_maker);
$titles = array("Motorized Bumper Boats", "Magic Wand TV Remote", "Bubble Wrap Calendar", "Jedi Bath Robes");

$urls = array("www.bumperboats.com", "www.magicremotes.com", "www.bubblewrapcalendar.com", "www.jedirobes.com");

$descriptions = array(
"Have all the bumper car fun you have at the amusement park<br/>
anywhere there is a pool!<br/>
only $99.99 per bumper boat, so have a splash!",

"Change the channel with a flick of your wrist with our<br/>
Magic Wand TV Remote, only $89.99.<br/>
A small price to pay for an enchanting TV watching experience!<br/>",

"Enjoy counting down the days with this brilliant bubble wrap calendar<br/>
Everyday that goes by, you can feel the sweet satisfaction of popping a<br/>
bubble! Only $20.00 for a year of fun!<br/>",

"Smell like a jedi after every shower with your very own jedi (bath) robe!<br/>
One size fits all, even Jabba the Hut could fit in one of these!<br/>
$80.00<br/>");

for($p = 0; $p < sizeof($descriptions); $p++)
{
    $title = $titles[$p];
    $url = $urls[$p];
    $desc = $descriptions[$p];
    $query = "INSERT INTO $table_name VALUES(0,\"$title\", \"$url\", \"$desc\", 0 )";
    $putter->in_query($query);
}


$connector->close_db();

?>

