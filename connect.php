<?php
header("Access-Control-Allow-Origin: *");
$conn = mysql_connect("localhost", "root", "") or die("Error conecting mysql");
mysql_select_db("stocks", $conn) or die("Error connecting Database");
?>
