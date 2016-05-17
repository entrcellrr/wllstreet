	<?php
include_once("connect.php");
function user_exist($user)
{
	$query = "SELECT * FROM users WHERE user_id='$user'";
	$result = mysql_query($query) or die("error1:" . mysql_error());
	return mysql_num_rows($result);
}	
function user_name($user)
{
	$query = "SELECT * FROM users WHERE user_id='$user'";
	$result = mysql_query($query) or die("error:" . mysql_error());
	$row = mysql_fetch_array($result) or die("error3:" . mysql_error());
	return $row['name'];	
}
function share_rate($share)
{
	$query = "SELECT * from share WHERE id='$share'";
	$result = mysql_query($query) or die("error12:" . mysql_error());
	$row = mysql_fetch_array($result) or die("" . mysql_error());
	
	
	return $row['currentrate'];
}
function user_money($user)
{
	$query = "SELECT * FROM users WHERE user_id='$user'";
	$result = mysql_query($query) or die("error:" . mysql_error());
	$row = mysql_fetch_array($result) or die("error3:" . mysql_error());
	return $row['money'];	
}
function update_user_buy($user, $money)
{
	$query = "UPDATE users SET money=$money WHERE user_id='$user'";
	$result = mysql_query($query) or die("error4:" . mysql_error());
}
function update_user_sell($user, $money)
{
	$query = "UPDATE users SET money=$money WHERE user_id='$user'";
	$result = mysql_query($query) or die("error4:" . mysql_error());
}
function transaction($user, $share, $number, $change_rate, $broker)
{   
	if($user!=0)
     {
	 $no_share=no_of_share($share);
	 $change_number=$no_share-$number;
	 update_no_of_share($share,$change_number);
	 }
	$query = "INSERT INTO transaction(user_id, c_id, amount, at_value, time, broker_id, change_in_stock)
		VALUES('$user', '$share', '$number', '" . share_rate($share) . "', '" . time() . "', '" . $broker . "', '" . $change_rate . "')";
	$result = mysql_query($query) or die("error5:" . mysql_error());
}
function pending($user, $share, $number, $change_rate, $broker)
{
	$query = "INSERT INTO pending(user_id, c_id, amount, at_value, time, broker_id, change_in_stock)
		VALUES('$user', '$share', '$number', '" . share_rate($share) . "', '" . time() . "', '" . $broker . "', '" . $change_rate . "')";
	$result = mysql_query($query) or die("error5:" . mysql_error());
}
function update_share($share, $change_rate)
{
	$query = "SELECT currentrate FROM share WHERE id=$share";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$query = "UPDATE share SET currentrate='" . ($row['currentrate']+$change_rate) . "' WHERE id='$share'";
	$result = mysql_query($query) or die("Error7:" . mysql_error());
}
function change_in_share($current_rate, $amount)
{
	$rand = rand(1,3);
	if($amount > 10)
	{
		$amount = log($amount, 10);
		$change = $amount*$amount + 3*$amount - 3;
	}
	else $change = $amount / 10;
	$change *= $current_rate/100;
	return $change;
	//return pow($current_rate, log($amount, 100))/8;
}
function user_holding($user)
{
	$query = "SELECT c_id, SUM( amount ) as sum FROM  `transaction` WHERE user_id=$user GROUP BY c_id";
	$result = mysql_query($query) or die("Error8:" . mysql_error());
	$i = 0;
	while($row = mysql_fetch_array($result))
	{
		$arr[$i][0] = $row['c_id'];
		$arr[$i][1] = $row['sum'];
		$i++;		
	}
	return $arr;
}
function news_share_change($share)
{
	$query = "SELECT id,change from news WHERE id=$share";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result) or die("error9:" . mysql_error());
	return $row['change'];
}
function no_of_share($share_id)
{
	$query = "SELECT * FROM share WHERE id=$share_id";
	$result = mysql_query($query) or die("error:" . mysql_error());
	$row = mysql_fetch_array($result) or die("error10:" . mysql_error());
	return $row['number'];	
}
function update_no_of_share($share_id, $change_number)
{
	$query = "UPDATE share SET number=$change_number WHERE id=$share_id";
	$result = mysql_query($query) or die("Error7:" . mysql_error());
}

?>