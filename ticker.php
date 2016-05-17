<?php
header("Access-Control-Allow-Origin: *");
include_once('connect.php');
include_once('function.php');
echo '<table><tr><th>Company</th><th>Current Rate</th><th colspan="2">Change</th></tr>';
$query="select id,name from share ";
if($queryrun=mysql_query($query))
 {    
        while($row=mysql_fetch_assoc($queryrun))
          {
            $share_id=$row['id'];
			$share_name=$row['name'];
			$query1='SELECT * FROM `transaction` t where c_id='.$share_id.' order by id desc limit 2';			
			if($queryrun1=mysql_query($query1))
			 {  //$stock1=mysql_result($queryrun1,0,'amount');
				$rec12=mysql_fetch_array($queryrun1);
                $stock1=$rec12['amount'];
                //if(mysql_result($queryrun1,1,'amount'))
				  $rec13=mysql_fetch_array($queryrun1);
                  if($rec13['amount'])
                  {
                    
				    $stock2=$rec13['amount'];
				  }
				else
				  {
				    
				    $stock2=0;
				  }
				//$val1=mysql_result($queryrun1,0,'change_in_stock');
                $val1=$rec12['change_in_stock'];
				//if(mysql_result($queryrun1,1,'change_in_stock'))
				
                if($rec13['change_in_stock'])
                {
				 $val2=$rec13['change_in_stock'];
				}
				else{
				 $val2=0;
				}
				if($stock1>0 && $stock2>0)
				 {
				   echo "<tr><td><br/>$share_name</td><td>Rs.".share_rate($share_id)."</td><td><img src='images//up.png'//></td><td>$val1</td></tr>"; 
				 }
				 else if(($stock1<0 && $stock2>0)){
				  echo "<tr><td><br/>$share_name</td><td>Rs.".share_rate($share_id)."</td><td><img src='images//down.png'//></td><td>$val1</td></tr>"; 
				 }
				  else if(($stock1>0 && $stock2<0)){
				 echo "<tr><td><br/>$share_name</td><td>Rs.".share_rate($share_id)."</td><td><img src='images//up.png'//></td><td>$val1</td></tr>"; 
				 }
				  else{
				 echo "<tr><td><br/>$share_name</td><td>Rs".share_rate($share_id)."</td><td><img src='images//down.png'//></td><td>$val1</td></tr>"; 
				 }
			 }
			 else echo mysql_error();
		 }
}			
echo '</table>';
?>