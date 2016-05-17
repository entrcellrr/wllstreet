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
	$no_share=no_of_share($share);
	if($user_money < $rate*$number)
	{
		echo "Not enough balance";
		echo " Have = '$user_money'";
		echo " Need = '" . $rate*$number . "'";
	}
	else if($no_share<$number || $no_share==0){
	 echo 'Not enough share';
	}
	else if($number>20)
	     {
		  echo 'More than 20 not allowed';
		 }
	else
	{
		update_user_buy($user, $user_money-$rate*$number);
		$money=user_money($user);
		$change_rate = change_in_share($rate, $number);
		transaction($user, $share, $number, $change_rate, $broker);
		update_share($share, $change_rate);
		echo "Transaction Successful $change_rate " . $rate*$number.'<br> Money Left :'.$money;;
	}
}
?>
</div><div class="hide">Hide</div>
<script type='text/javascript'>
	$(".hide").click(function() {
		$(this).parent().hide();
	});
</script>