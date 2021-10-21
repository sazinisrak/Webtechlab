<?php
$masage= $masage2 = "";
$name = $pass2 = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$pass=$_POST["pass"];
	$opass=$_POST["opass"];
	$pass2=$_POST["pass2"];

	 $data = file_get_contents("Admin_data.json");  
     $data = json_decode($data, true);

     if(empty($_POST["pass"]))
     {
     	$masage2="password is empty";
     }
     else
     {
     	if(strlen($pass) <8)
     	{
     		$masage2="password must contain 8 characters";
     	}
     	else
     	{
     		if(preg_match('/[#$%@]/', $pass)!==1)
     		{
     			$masage2= "must contain #$%@ any of this characters ";
     		}
     		else
     		{
     			if(strcasecmp($pass, $pass2)!==0)
     			{
     				$masage2="input password does not match";
     			}
     			else
     			{
     				if($pass==$opass)
     				{
     					$masage2="old password will not be accepted";
     				}
     				else
     				{
     					$masage2="Password change successful";
     				}
     			}
     		}
     	}
     }


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
		<div class="box">
		<section style="flex: all;">
			<div>
					<h1 style="text-align: center;">Password Change</h1>
			<div >
			<label>
				Old Password:<br>
				<input type="text" name="opass" value="Sazin@160">
			</label>
		</div>
		<div>
			<label>
				Password:<br>
				<input type="Password" name="pass" value="<?php echo $pass;?>">
				<span style="color: red">* <?php echo $masage;?></span>
			</label>
		</div>
		<div>
        <label> Retype Password:<br> 
        <input type="Password" name="pass2" value="<?php echo $pass2;?>" >
        <span style="color : red;">* <?php echo $masage2;?></span>
        </label>
        <br><br>
      </div>		
		<div>
			<input type="submit" name="submit">
		</div>

</body>
</html>