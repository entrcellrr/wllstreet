<?php
include_once("connect.php");
?>
<meta http-equiv="refresh" content="30">
<link rel="stylesheet" href="css/lboard.css" type="text/css"/>
<title>Score Board</title>
<?php


include_once("function.php");

 /****************Profit *******/
 /*echo '<div id="container"><div id="top"><div id="top_left"><div id="profit"><table>';
 $query1="select sum(profit) as profit,user_id from(
select n*avg(a.at_value)-n*avg(b.at_value) as profit,a.user_id,a.c_id from (select sum(amount) as n,user_id,c_id from transaction where amount<0 and user_id!=0 and user_id!=187 group by user_id,c_id) as abc ,transaction a,transaction b where a.amount>0 and b.amount<0 and a.c_id=b.c_id and abc.user_id=a.user_id and abc.c_id=a.c_id group by a.user_id,a.c_id) as abcd where profit>0 group by user_id order by profit desc limit 10";
if($queryrun1=mysql_query($query1))
 {echo '<tr><th colspan="3" class="tablehead">Profit</th></tr><tr><th>Name</th><th>Profit(in Rs.)</th></tr>';
   $i=0;
   while($row=mysql_fetch_assoc($queryrun1))
   {
    $name=user_name($row['user_id']);  
    $profit=$row['profit'];
	$rounded_profit=number_format((float)$profit, 3, '.', '');
    echo "<tr><td>$name</td><td>$rounded_profit</td></tr>";
	$i++;
   }
   for($x=0;$x<(10-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td>Profit</td></td>";
 }
 else echo 'Error' ;
 echo '</table></div></div>';*/
 /************Ends*******************/

/* ******Remaing Amount ************/
echo '<div id="container"><div id="top"><div id="top_left"><div id="profit"><table>';
$query1='select * from users order by money desc limit 10';
if($queryrun1=mysql_query($query1))
 {
echo '<tr><th colspan="3" class="tablehead">Available  Balance</th></tr><tr><th>Name</th><th>Balance(in Rs.)</th></tr>';
   $i=0;
   while($row=mysql_fetch_assoc($queryrun1))
   {
    $name=user_name($row['user_id']);  
    $profit=$row['money'];
	//$rounded_profit=number_format((float)$profit, 3, '.', '');
    echo "<tr><td>$name</td><td>$profit</td></tr>";
	$i++;
   }
  /* for($x=0;$x<(10-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td>Profit</td></td>";
	*/
 }
 else echo 'Error' ;
 echo '</table></div></div>';
 /******************end ***************/
 
 /****************Loss *******/
 echo '<div id="top_middle"><div id="loss"><table>'; 
$query2="select sum(profit)*(-1) as profit,user_id from(
select n*avg(a.at_value)-n*avg(b.at_value) as profit,a.user_id,a.c_id from (select sum(amount) as n,user_id,c_id from transaction where amount<0 and user_id!=0 and user_id!=187 group by user_id,c_id) as abc ,transaction a,transaction b where a.amount>0 and b.amount<0 and a.c_id=b.c_id and abc.user_id=a.user_id and abc.c_id=a.c_id group by a.user_id,a.c_id) as abcd where profit<0 group by user_id order by profit asc limit 10";
if($queryrun2=mysql_query($query2))
 { echo '<tr><th colspan="3" class="tablehead">Minimum Lost</th><tr><th>Name</th><th>Loss(in Rs.)</th></tr>';
   $i=0;  
  while($row=mysql_fetch_assoc($queryrun2))
   {
    $name=user_name($row['user_id']);
	 $profit=$row['profit'];
	$rounded_profit=number_format((float)$profit, 3, '.', '');
    echo "<tr><td>$name</td><td>$rounded_profit</td></tr>";
	$i++;
   }
    for($x=0;$x<(10-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td>Loss</td></td>";
 }
 else echo 'Error' ;
  echo '</table></div></div>';
 /************Ends*******************/
 
 
 /****************Net Profit *******/
 /*echo '<div id="top_right"><div id="net_profit"><table>'; 
$query3="select sum(profit) as profit,user_id from(
select n*avg(a.at_value)-n*avg(b.at_value) as profit,a.user_id,a.c_id from (select sum(amount) as n,user_id,c_id from transaction where amount<0 and user_id!=0 and user_id!=187 group by user_id,c_id) as abc ,transaction a,transaction b where a.amount>0 and b.amount<0 and a.c_id=b.c_id and abc.user_id=a.user_id and abc.c_id=a.c_id group by a.user_id,a.c_id) as abcd  group by user_id order by profit desc limit 10";
if($queryrun3=mysql_query($query3))
 { echo '<tr><th colspan="2" class="tablehead">Net Profit</th></tr><tr><th>Name</th><th>Profit(in RS.)</th></tr>';
    $i=0;
   while($row=mysql_fetch_assoc($queryrun3))
   {
   $name=user_name($row['user_id']);
    $profit=$row['profit'];
	$rounded_profit=number_format((float)$profit, 3, '.', '');
    echo "<tr><td>$name</td><td>$rounded_profit</td></td>";
	$i++;
   }
    for($x=0;$x<(10-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td>Net_Profit</td></td>";
 }
 else echo 'Error' ;
 echo '</table></div></div></div>';
 */
 /************Ends*******************/
 
  /****************Most Efficient *******/
 echo '<div id="bottom"><div id="bottom_left"><div id="most_e"><table>'; 
$query3="select sum(profit)/(-e)*100 as profit,user_id from(
select n*avg(a.at_value) as e, n*avg(a.at_value) -n*avg(b.at_value) as profit,a.user_id,a.c_id from (select sum(amount) as n,user_id,c_id from transaction where amount<0 and user_id!=0 and user_id!=187 group by user_id,c_id) as abc ,transaction a,transaction b where a.amount>0 and b.amount<0 and a.c_id=b.c_id and abc.user_id=a.user_id and abc.c_id=a.c_id group by a.user_id,a.c_id) as abcd group by user_id order by profit desc limit 5";
if($queryrun3=mysql_query($query3))
 { echo '<tr><th colspan="4" class="tablehead">Most Efficient</th><tr><th>Name</th><th colspan="2">Percent(%)</th></tr>';
   $i=0;  
  while($row=mysql_fetch_assoc($queryrun3))
   {
    $i++;
    $name=user_name($row['user_id']);
	$profit=$row['profit'];
	$eff=number_format((float)$profit, 3, '.', '');
	if($eff<0)
	{$eff=$eff*(-1);
    echo "<tr><td>$name</td><td>$eff</td></td><td><img src='images/down.png' width='20' height='20'></td>";}
	else{
    echo "<tr><td>$name</td><td>$eff</td></td><td><img src='images/up.png' width='20' height='20'></td>";
   }}
    for($x=0;$x<(5-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td colspan='2'>Efficency</td></td>";
 }
 else echo 'Error' ;
 echo '</table></div></div>';
 /************Ends*******************/
 
 

 /**************Max Share Buyed************/
 
  echo '<div id="bottom_right"><div id="share_buyed"><table>'; 
$query3="SELECT sum(amount) as no_of_share,user_id from transaction  where user_id!=0 and user_id!=187 group by user_id order by no_of_share desc limit 5";
if($queryrun3=mysql_query($query3))
 { echo '<tr><th colspan="3" class="tablehead">Maximun Shares Buyed</th><tr><th>Name</th><th>Share_no.</th></tr>';
   $i=0;  
  while($row=mysql_fetch_assoc($queryrun3))
   {
   $name=user_name($row['user_id']);
    echo "<tr><td>$name</td><td>$row[no_of_share]</td></td>";
	$i++;
   }
    for($x=0;$x<(5-$i);$x++)
    echo "<tr class='disable'><td>Name</td><td>ShareNo.</td></td>";
 }
 else echo 'Error' ;
 echo '</table></div></div></div></div>';
 /************Ends*******************/
 
 
?>