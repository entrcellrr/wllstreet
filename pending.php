<?php
header("Access-Control-Allow-Origin: *");
include_once("function.php");
$user = $_GET['user'];
$share = $_GET['share'];
$number = $_GET['number'];
$x = $_GET['x'];
$broker = $_GET['broker'];
?>
<script type='text/javascript'>
	var x = <?php echo $x; ?>;
	$("#buy-pop-up" + x).show();
</script>
<div class="content">
<?php
if(!user_exist($user))
{
	echo "user doesn't exist";
}
else
{
	$rate = share_rate($share);
	$user_money = user_money($user);
	if($user_money < $rate*$number)
	{
		echo "Not enough balance";
		echo " Have = '$user_money'";
		echo " Need = '" . $rate*$number . "'";
	}
	else
	{
		$query = "SELECT * FROM pending WHERE user_id='$user' AND c_id='$share'";
		$result = mysql_query($query);
		if(mysql_num_rows($result) > 0)
		{
			echo "Already tried";
		}
		else
		{
			update_user_buy($user, $user_money-$rate*$number);
			$change_rate = change_in_share($rate, $number);
			pending($user, $share, $number, $change_rate, $broker);
			echo "Transaction Successful $change_rate " . $rate*$number;
		}
	}
}
?>
</div><div class="hide">Hide</div>
<script type='text/javascript'>
	$(".hide").click(function() {
		$(this).parent().hide();
	});
</script>