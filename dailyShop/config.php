<?php
   /**
    * Template File Doc Comment
    * 
    * PHP version 7
    *
    * @category Template_Class
    * @package  Template_Class
    * @author   Author <author@domain.com>
    * @license  https://opensource.org/licenses/MIT MIT License
    * @link     http://localhost/
    */

    $siteurl = "http://localhost/templates/dailyShop/";

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}



?>
