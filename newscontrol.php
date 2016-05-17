<?php
include_once("connect.php");
?>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<title>SHARE INFO.</title>
<body>
<div id="container">
<?php
include_once("function.php");
/*****************headlines for shares*****************/

$query='select * from news';
		if($queryrun=mysql_query($query))
		  
		  {$i=0;
		  echo '<div class="news" >';
		   while($row=mysql_fetch_assoc($queryrun))
				{ 
				  echo "<div id='news$i'  change=$row[change]><marquee>$row[line]</marquee></div><br/>";
				  $i++;
				}
          echo '</div>'				;
			}
			echo '<div id="message"><p id="headline"></p></div>';
			
			
/********************Ends***********************/			
?>
<!--------------Ticker Starts--------------->
<div id="ticker">

</div>

<!--------------Ends------------------------->
<div class="share_graph" ></div>
<!------------------Share  RAte--------------------------->
<div class="share_rate" >
 <?php
				$query = "SELECT * FROM share";
				$result = mysql_query($query);
				$i = 1;
				echo "<div class=\"share-details\"><b><center>S&nbsp;&nbsp;H &nbsp;&nbsp;A&nbsp;&nbsp; R&nbsp;&nbsp; E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I&nbsp;&nbsp; N&nbsp;&nbsp; I&nbsp;&nbsp; T&nbsp;&nbsp; I&nbsp;&nbsp; A&nbsp;&nbsp; L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;V&nbsp;&nbsp; A&nbsp;&nbsp; L&nbsp;&nbsp; U&nbsp;&nbsp; E</center></b><table>";
				while($row = mysql_fetch_array($result))
				{
					echo "<tr id='share_rate_row'><td class=\"left\">$row[name]</td><td class=\"right\" id=\"share$i\"><b>Rs.</b>$row[startrate].00</td></tr>";
					$i++;
				}
				echo '</table></div>'
			?>
</div>

<!------------------------------------------------------------->
<div id="result_change_share_rate" ></div>
</div>
</body>
<style type="text/css">
 
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var i=6;
var y=0;

	/*************For changing the headlines and rate of share ***************/
		 function display()
				 { 
				    i++;
					var news=$("#news"+i).html();
					$("#headline").html(news);
				    setTimeout(function(){news_share_change();},120000);
		//			setTimeout(function(){news_share_change();},240000);
					if(i==95)
					stop_display();
		         }
 display();
 inter=setInterval(display,300000); 
		 function stop_display()
				{
					clearInterval(inter);
				}
		  function news_share_change()
				{ 
					
					$("#result_change_share_rate").load("news_share_rate.php?news_id="+i);
				}
		  
  /**********************************Ends************************************/
  
/**************************************graph start**************************/
 var x=1;
		 function graph_update(z)
					   {
						   var path="<img src=\"graph.php?share_id="+z+"\"/>";
						   $('.share_graph').html(path);
					   }
		  
		 function graph_call()
					  {
							graph_update(x);
							x++;
							if(x==10)
							x=1;
					   }



interval=setInterval(graph_call,10000);
});
/**********************************ends***********************************/

function ticker()
	{
		$('#ticker').load('ticker.php');
	}
ticker();
ticker_interval=setInterval(ticker,10000)	;
</script>
