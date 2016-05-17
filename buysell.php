<?php
include_once('include.php');
?>


<html>

<head>
<title>Wall Street</title>
<link rel="stylesheet" type="text/css" href="stylesheet/main.css" />
<script type="text/javascript" src="script/jquery.js"></script>
</head>

<body>
<div id="container">
	<div id="left">
		<div id="left-top">
			<?php
				$query = "SELECT * FROM share";
				$result = mysql_query($query);
				$i = 1;
				while($row = mysql_fetch_array($result))
				{
					echo "<div class=\"share-details\">";
					echo "<ul class=\"list share-list\">";
					echo "<li class=\"left\">$row[name]</li><li class=\"right\" id=\"share$i\"></li>";
					echo "</ul></div>";
					$i++;
				}
			?>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
			<div class="share-details"></div>
		</div>
		<div id="left-bottom">
			<div class="broker-details" id="broker1">
				<ul class="list broker-list">
					<li>12127</li><li>B</li><li>HDFC</li><li>100</li><li><img src="images/close.png" /></li>
				</ul>
			</div>
			<div class="broker-details" id="broker2">3</div>
			<div class="broker-details" id="broker3">4</div>
			<div class="broker-details" id="broker4">5</div>
			<div class="broker-details" id="broker5">6</div>
			<div class="broker-details" id="broker6">7</div>
		</div>
	</div>
	<div id="right">
		<div id="right-top">
			<div class="buy">
				<div class="pop-up" id="buy-pop-up1"></div>
				<div class="buy-label"><div style="height:10%"></div>B U Y</div>
					<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-user-id1" type="text" size="10" value="user id" /></div>
					<div class="buy-details" style="width:35%">
					<input type="hidden" id="buy-share-select-value1" size="10" />
					<div class="buy-share-select1" id="buy-share-select1-option01">Ford Motors</div>
					<div class="buy-share-select1" id="buy-share-select1-option02">INFOSYSTEMS</div>
					<div class="buy-share-select1" id="buy-share-select1-option03">LOOGLE</div>
					<div class="buy-share-select1" id="buy-share-select1-option04">ABBOTT HEALTHARE</div>
					<div class="buy-share-select1" id="buy-share-select1-option05">HEERO MOTOCORP.</div>
					<div class="buy-share-select1" id="buy-share-select1-option06">AIRTEL</div>
					<div class="buy-share-select1" id="buy-share-select1-option07">STARLITE INDUSTRIES</div>
					<div class="buy-share-select1" id="buy-share-select1-option08">COAL IND</div>
					<div class="buy-share-select1" id="buy-share-select1-option09">APPLE</div>
					<div class="buy-share-select1" id="buy-share-select1-option10">IDBI BANK</div>
					<div class="buy-share-select1" id="buy-share-select1-option11"></div>
					<div class="buy-share-select1" id="buy-share-select1-option12"></div>
				</div>
				<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-number-of-shares1" type="text" size="10" value="number of shares" /></div>
				<div class="buy-details" style="width:10%"><br/><br/><br/><input id="buy-submit1" class="buy-submit" type="submit" size="10" value="buy"/></div>
			</div>
			<div class="buy">
				<div class="pop-up" id="buy-pop-up2"></div>
				<div class="buy-label"><div style="height:10%"></div>B U Y</div>
				<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-user-id2" type="text" size="10" value="user id" /></div>
				<div class="buy-details" style="width:35%">
					<input type="hidden" id="buy-share-select-value2" size="10" />
					<div class="buy-share-select2" id="buy-share-select2-option01">Ford Motors</div>
					<div class="buy-share-select2" id="buy-share-select2-option02">INFOSYSTEMS</div>
					<div class="buy-share-select2" id="buy-share-select2-option03">LOOGLE</div>
					<div class="buy-share-select2" id="buy-share-select2-option04">ABBOTT HEALTHARE</div>
					<div class="buy-share-select2" id="buy-share-select2-option05">HEERO MOTOCORP.</div>
					<div class="buy-share-select2" id="buy-share-select2-option06">AIRTEL</div>
					<div class="buy-share-select2" id="buy-share-select2-option07">STARLITE INDUSTRIES</div>
					<div class="buy-share-select2" id="buy-share-select2-option08">COAL IND</div>
					<div class="buy-share-select2" id="buy-share-select2-option09">APPLE</div>
					<div class="buy-share-select2" id="buy-share-select2-option10">IDBI BANK</div>
					<div class="buy-share-select2" id="buy-share-select2-option11"></div>
					<div class="buy-share-select2" id="buy-share-select2-option12"></div>
				</div>
				<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-number-of-shares2" type="text" size="10" value="number of shares" /></div>
				<div class="buy-details" style="width:10%"><br/><br/><br/><input id="buy-submit2" class="buy-submit" type="submit" size="10" value="buy"/></div>
			</div>
			<div class="buy">
				<div class="pop-up" id="buy-pop-up3"></div>
				<div class="buy-label"><div style="height:10%"></div>B U Y</div>
				<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-user-id3" type="text" size="10" value="user id" /></div>
				<div class="buy-details" style="width:35%">
					<input type="hidden" id="buy-share-select-value3" size="10" />
					<div class="buy-share-select3" id="buy-share-select3-option01">Ford Motors</div>
					<div class="buy-share-select3" id="buy-share-select3-option02">INFOSYSTEMS</div>
					<div class="buy-share-select3" id="buy-share-select3-option03">LOOGLE</div>
					<div class="buy-share-select3" id="buy-share-select3-option04">ABBOTT HEALTHARE</div>
					<div class="buy-share-select3" id="buy-share-select3-option05">HEERO MOTOCORP.</div>
					<div class="buy-share-select3" id="buy-share-select3-option06">AIRTEL</div>
					<div class="buy-share-select3" id="buy-share-select3-option07">STARLITE INDUSTRIES</div>
					<div class="buy-share-select3" id="buy-share-select3-option08">COAL IND</div>
					<div class="buy-share-select3" id="buy-share-select3-option09">APPLE</div>
					<div class="buy-share-select3" id="buy-share-select3-option10">IDBI BANK</div>
					<div class="buy-share-select3" id="buy-share-select3-option11"></div>
					<div class="buy-share-select3" id="buy-share-select3-option12"></div>
				</div>
				<div class="buy-details"><br/><br/><br/><input class="initial" id="buy-number-of-shares3" type="text" size="10" value="number of shares" /></div>
				<div class="buy-details" style="width:10%"><br/><br/><br/><input id="buy-submit3" class="buy-submit" type="submit" size="10" value="buy"/></div>
			</div>
		</div>
		<div id="right-bottom">
			<div class="sell">
				<div class="pop-up" id="sell-pop-up1">				</div>
				<div class="sell-label"><div style="height:10%"></div>SELL</div>
				<div class="sell-details">
					<input type="text" class="sell-user-id initial" id="sell-user-id1" value="user id" size=10/>&nbsp;&nbsp;
					<input type="submit" class="sell-submit" id="sell-submit1" value="go"/>
				</div>
				<div id="blank1"></div>
				<div class="sell-content">
					<input type="hidden" id="sell-user-id-store1" />
					<?php
						$result = mysql_query($query);
						$i = 1;
						while($row = mysql_fetch_array($result))
						{
							if($i<10) $j = 0 . $i;
							else $j=$i;
							echo "<div class=\"sell-share-label\">$row[name]</div>";
							echo "<div class=\"sell-have\" id=\"sell-have1$j\">&nbsp;</div>";
							echo "<input type=\"text\" class=\"sell-sell-number sell-sell-number1\" id=\"sell-sell-number1$j\" size=3 />";
							echo "<input type=\"submit\" class=\"sell-sell-go sell-sell-go1\" id=\"sell-sell-go$j\" value=\"     \"/>";
							echo "<br style=\"clear:both;\" />";
							$i++;
						} 
					?>
				</div>
			</div>
			<div class="sell">
				<div class="pop-up" id="sell-pop-up2">				</div>
				<div class="sell-label"><div style="height:10%"></div>SELL</div>
				<div class="sell-details">
					<input type="text" class="sell-user-id initial" id="sell-user-id2" value="user id" size=10/>&nbsp;&nbsp;
					<input type="submit" class="sell-submit" id="sell-submit2" value="go"/>
				</div>
				<div id="blank2"></div>
				<div class="sell-content">
					<input type="hidden" id="sell-user-id-store2" />
					<?php
						$result = mysql_query($query);
						$i = 1;
						while($row = mysql_fetch_array($result))
						{
							if($i<10) $j = 0 . $i;
							else $j=$i;
							echo "<div class=\"sell-share-label\">$row[name]</div>";
							echo "<div class=\"sell-have\" id=\"sell-have2$j\">&nbsp;</div>";
							echo "<input type=\"text\" class=\"sell-sell-number sell-sell-number2\" id=\"sell-sell-number2$j\" size=3 />";
							echo "<input type=\"submit\" class=\"sell-sell-go sell-sell-go2\" id=\"sell-sell-go$j\" value=\"     \"/>";
							echo "<br style=\"clear:both;\" />";
							$i++;
						} 
					?>
				</div>
			</div>
			<div class="sell">
				<div class="pop-up" id="sell-pop-up3">				</div>
				<div class="sell-label"><div style="height:10%"></div>SELL</div>
				<div class="sell-details">
					<input type="text" class="sell-user-id initial" id="sell-user-id3" value="user id" size=10/>&nbsp;&nbsp;
					<input type="submit" class="sell-submit" id="sell-submit3" value="go"/>
				</div>
				<div id="blank3"></div>
				<div class="sell-content">
					<input type="hidden" id="sell-user-id-store3" />
					<?php
						$result = mysql_query($query);
						$i = 1;
						while($row = mysql_fetch_array($result))
						{
							if($i<10) $j = 0 . $i;
							else $j=$i;
							echo "<div class=\"sell-share-label\">$row[name]</div>";
							echo "<div class=\"sell-have\" id=\"sell-have3$j\">&nbsp;</div>";
							echo "<input type=\"text\" class=\"sell-sell-number sell-sell-number3\" id=\"sell-sell-number3$j\" size=3 />";
							echo "<input type=\"submit\" class=\"sell-sell-go sell-sell-go3\" id=\"sell-sell-go$j\" value=\"     \"/>";
							echo "<br style=\"clear:both;\" />";
							$i++;
						} 
					?>
				</div>
			</div>
		</div>	
	</div>
</div>
<script type="text/javascript" src="script/script.js"></script>
</body>

</html>