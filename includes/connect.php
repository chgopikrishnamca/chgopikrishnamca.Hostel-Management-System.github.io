<?php
/**
 * Created by PhpStorm.
 * User: Gopikrishna
 * Date: 30-Mar-18
 * Time: 11:25
 */

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","myhostel");

$con=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to connect Database");

?>