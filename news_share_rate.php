<?php
include_once('connect.php');
include_once('function.php');
if(isset($_GET['news_id']) && !empty($_GET['news_id']))
{
 $news_id=$_GET['news_id'];
 $query="select * from news where sid=$news_id";
 
 $queryrun=mysql_query($query) or die ('Error: news'.mysql_error());
 //$change_value=mysql_result($queryrun,0,'change') or die ('Error: news value'.mysql_error());
 //$share_id=mysql_result($queryrun,0,'id') or die ('Error: news id'.mysql_error());
 $change=mysql_fetch_row($queryrun);

// $current_rate=share_rate($share_id);
 $current_rate=share_rate($change[0]);
 //$change_rate =($change_value*$current_rate)/400;
 $change_rate =($change[2]*$current_rate)/400;
 update_share($change[0], $change_rate); 
 if($change_rate>0)
  $amount=1;
  else
  {
   $amount=-1;
   $change_rate=$change_rate*(-1);
  } 
 transaction('000', $change[0],$amount, $change_rate,'00');
 
}
?>