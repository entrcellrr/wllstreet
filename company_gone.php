<?php
include_once('connect.php');
include_once('function.php');
$query="select n*at_value as loss,t.user_id as user_id,money from (select sum(amount) as n,user_id from transaction where c_id=3 group by user_id) as abc join transaction t join users u where abc.user_id=t.user_id and t.user_id=u.user_id and amount>0 and c_id=3 group by t.user_id";
$result=mysql_query($query) or die('error: company'.mysql_error());
while($row=mysql_fetch_assoc($result))
 {
    $money=$row['money'];
	$user=$row['user_id'];
	$loss=$row['loss'];
	$current_money=$money-$loss;
	update_user_buy($user,$current_money);

 }
 $query="delete from transaction where c_id=9";
 mysql_query($query) or die('error: company2'.mysql_error());

?>