<?php
header("Content-type: image/png");
include_once('phpMyGraph5.0.php');
include_once('connect.php');

        $query='select * from transaction t join share s where c_id='.$_GET['share_id'].' and s.id=t.c_id';
		//'select * from transaction where c_id='.$_GET['share_id'];

		if($queryrun=mysql_query($query))
		  {

			$val=0;
		   $initial_time= mysql_result($queryrun,0,'time');
		   $data = array();
		   $name= mysql_result($queryrun,0,'name');
		       while($row=mysql_fetch_assoc($queryrun))
				{
				  
				  $diff_time=($row['time']-$initial_time)/(60*15);
				  if($row['amount']>0)
				  {
				    $val=$val+$row['change_in_stock'];
				  }
				  else
				  {
				     $val=$val-$row['change_in_stock'];
				  }
				  $data[$diff_time]=$val;
				  
			    }	
			}
			else
			echo "wrong";
	   $cfg['title']=$name;
       $cfg['width']=750;
	   $cfg['height']=400;
	   $cfg['background-color']='#CCCCCC';
	   $cfg['title-font-size']=6;
	    $cfg['value-font-size']=6;
    //Create new graph 
        
		
		
		
		$graph = new phpMyGraph();
        
		
        //Parse vertical line graph
        $graph->parseVerticalLineGraph($data,$cfg); 
	
?>