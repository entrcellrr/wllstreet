<?php
include_once("function.php");
$query = "SELECT * FROM share";
$result = mysql_query($query);
while($row = mysql_fetch_array($result))
{
	$i = $row['id'];
	$j = $row['number'];
	$query = "SELECT * FROM pending where c_id='$i' ORDER BY RAND(100)";
	$result2 = mysql_query($query);
	while($j > 0)
	{
	   if($result2 === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
		$row2 = mysql_fetch_array($result2,MYSQL_BOTH);
		$user = $row2['user_id'];
		$share = $row2['c_id'];
		$number = $row2['amount'];
		$change_rate = $row2['change_in_stock'];
		$broker = $row2['broker_id'];
		if(($row['number']-$number) < 0) break;
		transaction($user, $share, $number, $change_rate, $broker);
		update_share($share, $change_rate);
		$j -= $number;
		mysql_query("DELETE FROM pending where id=$row2[id]") or die("eooro" . mysql_error());
		mysql_query("UPDATE share SET number='" . ($row['number']-$number) . "' WHERE id='$i'") or die("eooroawd" . mysql_error());
	}
	while($row2 = mysql_fetch_array($result2))
	{
		$user = $row2['user_id'];
		$share = $row2['c_id'];
		$number = $row2['amount'];
		$change_rate = $row2['change_in_stock'];
		$broker = $row2['broker_id'];		
	}
}