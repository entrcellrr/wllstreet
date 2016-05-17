
<head> 
	<link rel="stylesheet" type="text/css" href="css/validationEngine.css">
	<link rel="stylesheet" type="text/css" href="css/template.css">
	<script type="text/javascript" src="script/jquery.js"></script>
	<script type="text/javascript" src="script/jquery_validationEngine.js"></script>
	<script type="text/javascript" src="script/jquery_validationEngine_en.js"></script>
	<script type="text/javascript" src="script/val.js"></script>
	<style type="text/css">
    	tr{
			padding:10px 10px 10px 10px;
			border-bottom:groove;}
    </style>
	
</head> 
<?php
    
	include_once("php/connect.php");


	error_reporting(E_NOTICE^E_ALL);
		if(isset($_POST['user_id'])&&isset($_POST['name'])&&isset($_POST['contact_no'])&&isset($_POST['college'])&&isset($_POST['email_id']))
		{
			$user_id=$_POST['user_id'];
			$name=$_POST['name'];
			$contact_no=$_POST['contact_no'];
			$college=$_POST['college'];
			$email_id=$_POST['email_id'];
			if(!empty($user_id)&&!empty($name)&&!empty($contact_no)&&!empty($college)&&!empty($email_id))
			{
					$var=1;
					$query1="select * from users where user_id='$user_id'";
					$queryrun=mysql_query($query1);
					if(mysql_num_rows($queryrun)==1){
						echo "User Already exist with User id :".$user_id;
					}else{
					
						$query="insert into users(user_id,name,contact_no,college,email_id) values('".mysql_real_escape_string($user_id)."','".mysql_real_escape_string($name)."','".mysql_real_escape_string($contact_no)."','".mysql_real_escape_string($college)."','".mysql_real_escape_string($email_id)."');";
						if($queryrun=mysql_query($query))
						echo "Registered with User id: ".$user_id;
					}
				}
					
			else{
			$var=0;
			echo "All fields are required!!!";
			}
			}
            
  	$data1=mysql_query("select * from users");
	while($rec11=mysql_fetch_row($data1))
	{
		$uid1=$rec11[1];
	}
?>
<form class="formular" action="register.php" method="POST" id="formID">
	<fieldset>
		<legend><b>RESISTRATION FORM</b></legend>
		<table id="table">
		<tr>
			<td>User ID:</td>
			<td><input type="text" name="user_id" value= "<?php echo $uid1+1 ?>"  id="req" class="validate[required,custom[number]] text-input" readonly="true" style="background-color: #eeeeee;" /></td>
			</tr>	
			<td>Name:</td>
			<td><input type="text" name="name" value= "<?php if($var==0){echo $name;}?>"  id="req" class="validate[required,custom[onlyLetterSp]] text-input"/></td>
			</tr>
		<tr>
			<!--<td>Branch</td>
			<td><select name="branch" value= "<?php if($var==0) echo $branch;?>" SIZE=1 id="branch" class="validate[required] text-input">
				<OPTION value>Select your branch</OPTION>
				<option>INFORMATION TECHNOLOGY</option>
				<OPTION>COMPUTER SCIENCE</OPTION>
				<OPTION>ECTRONICS & TELECOMMUNICATION</OPTION>
				<OPTION>MINNING</OPTION>
				<OPTION>METALLURGY</OPTION>
				<OPTION>BIO-TECNOLOGY</OPTION>
				<OPTION>ELECTRICAL</OPTION>
				<OPTION>MECHANICAL</OPTION>
				<OPTION>CHEMICAL</OPTION>
				<OPTION>BOI-MEDICAL</OPTION>
				<OPTION>CIVIL ENGINERING</OPTION>
				</select>

			</td>
			</tr>-->
			<td>E mail:</td>
			<td><input type="text" name="email_id" class="validate[required,custom[email]] text-input"></td>
		</tr>
		<tr>
			<td>Contact No: +91</td>
			<td><input type="text" name="contact_no" value= "<?php if($var==0) echo $contact_no;?>" id="contact" class="validate[required,custom[phone]] text-input"/></td>
		</tr>
		<tr>
			<td>College:</td>
			<td><input type="text" name="college" value="<?php if($var==0) echo $college;?>" id="college" class="validate[required] text-input" /></td><td></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="sub" value="SUBMIT"/></td>
		</tr>
		</table>
	</fieldset>
</form>
