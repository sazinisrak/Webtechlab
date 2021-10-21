<?php
$masage= $masage2 = "";
$name = $pass = "" ;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$name=$_POST["name"];
	$pass=$_POST["pass"];

	 $data = file_get_contents("data.json");  
     $data = json_decode($data, true);


     if (empty($_POST["name"])) 
     {
     	$masage="name is empty";
     }
     else
     {
     	if (strlen($name) <3) 
     	{
     		$masage="name must more then 2 characters";
     	}
     	else
     	{
     		if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1)
     		{
              $masage ="Name can contain letter,desh,dot and space";  
            }
     	}

     }
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
					<h1 style="text-align: center;">Login</h1>
			<div >
			<label>
				User Name:<br>
				<input type="text" name="name" value="<?php echo $name;?>">
				 <span style="color: red">* <?php echo $masage;?></span>
			</label>
		</div>
		<div>
			<label>
				Password:<br>
				<input type="Password" name="pass" value="<?php echo $pass;?>">
				<span style="color: red">* <?php echo $masage2;?></span>
			</label>
		</div>		
		<div>
			<label>
				<input type="checkbox" name="remamber">
				Remamber Me
			</label>
		</div>
		<div>
			<input type="submit" name="submit">
			<button type="submit" formaction="Lab_2.php">Registration</button>
		</div>
		<?php
		echo $masage;
		?>
		<div>
			<a href="pass.php">Forgot Password</a>
		</div>
			</div>
<!-- 			<div>
				<div class="box.pic">
					<img src="Admin.png" height="100" width="100">
				</div>
			</div> -->
		</section>		
		</div>
	</form>

</body>
</html>