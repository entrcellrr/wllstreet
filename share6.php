<?php
header("Access-Control-Allow-Origin: *");
include("connect.php");
$query = "SELECT currentrate FROM share where id='6'";
$result = mysql_query($query) or die("Error" . mysql_error());
$row = mysql_fetch_array($result);
echo $row['currentrate'];
?>
