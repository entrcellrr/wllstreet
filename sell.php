<?php
header("Access-Control-Allow-Origin: *");
include_once("function.php");
$user = $_GET['user'];
$share = $_GET['share'];
$number = $_GET['number'];
$x = $_GET['x'];
$broker = $_GET['broker'];
?>
<script type="text/javascript">
$("#sell-pop-up" + <?php echo $x; ?>).show();
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
	$user_holding = user_holding($user);
	$flag = false;
	for($i=0;$i<sizeof($user_holding);$i++)
	{
		if($user_holding[$i][0] == $share)
		{
			$flag = true;
			if($user_holding[$i][1] < $number)
			{
				echo "don't have enough amount";
			}
			else if($number>20)
			{
			 echo 'More than 20';
			}
			else 
			{
				update_user_sell($user, $user_money+$rate*$number);
				$money=user_money($user);
				$change_rate = change_in_share($rate, $number);
				transaction($user, $share, -1*$number, $change_rate, $broker);
				update_share($share, -1.005*$change_rate);
				echo "Transaction Successful $change_rate " . $rate*$number.'<br> Money Left :'.$money;
				
			}
		}
	}
}
?>
</div>
<div class="hide">hide</div>
<script type='text/javascript'>
	$(".hide").click(function() {
		$(this).parent().hide();
	});
	$("#blank" + <?php echo $x ?>).load("details.php/?user=" + <?php echo $user; ?> + "&x=" + <?php echo $x; ?>);
</script>