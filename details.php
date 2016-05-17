<?php
header("Access-Control-Allow-Origin: *");
include_once("function.php");
$user = $_GET['user'];
$x = $_GET['x'];
$arr = user_holding($user);
?>
<script type="text/javascript">
	<?php
		for($i=0;$i<sizeof($arr);$i++)
		{ if($arr[$i][0]>=10)
		   {
		?>
			$("#sell-have" + <?php echo $x.$arr[$i][0]; ?>).html("<?php echo $arr[$i][1]; ?>");
<?php
    }
	else{
	?>
	$("#sell-have" + <?php echo $x ?> + "0" + <?php echo $arr[$i][0] ?>).html("<?php echo $arr[$i][1]; ?>");
	<?php
	}}
	
	?>
</script>