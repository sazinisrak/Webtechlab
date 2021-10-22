<!DOCTYPE html>
<html>
<head>
    <title>
        Dashbord
    </title>
</head>

<body class="background_color">
    <?php

    session_start();
    if (!isset($_SESSION['username'])) {
		session_destroy();
		header("location:login.php");
	}
    $usernameErr=$passwordErr=$confirm_passwordErr= "";
    $name = $username = $password  = $email= $dob= $picture= "";
	
	if (isset($_SESSION['name'])) {
        $name=$_SESSION['name'];
        $username=$_SESSION['username'];
        $password=$_SESSION['password'];
        $email=$_SESSION['email'];
        $dob=$_SESSION['dob'];
        $gender=$_SESSION['gender'];
        $picture=$_SESSION['picture'];
	}

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username=  test_input($_POST["username"]);
        $password= $_POST["password"];


        if (empty($username)) {
            $usernameErr = "Username is required";
        } else {
            if (strlen($username)<3) {
                $usernameErr = "Username must contain at least 2 character";
            }
            else{
                if(preg_match('/^[A-Za-z0-9\s.-]+$/', $username) !== 1){
                    $usernameErr = "Username can contain letter, number, dot and desh";
                }
                else{
                    $data = file_get_contents("data.json");  
                    $data = json_decode($data, true);  
                    foreach($data as $row)  
                    {
                        if($row["username"]==$username){
                            $usernameErr="Username already exists";
                            break;
                        }       
                    } 
                }
            }
        }

        if (empty($password)) {
            $passwordErr = "Password is required";
        }
        else
        {
            if (strlen($password)<9) {
                $passwordErr = "Password must contain at least 8 character";
            }
            else{

                if(preg_match('/[#$%@]/', $password)!==1){
                    $passwordErr = "Password have to contain at least one '#' or '$' or '%' or '@'";
                }
            }
        }
      
    }
    ?>


    <div class="header">
        <p class="logo"><?php include 'header.php'; ?></p>
        
    </div>

    <div class="outer_box">
        <div class="inerBox">

        <table border=0 style="width:800px;">
            <tr>
                <td class="td1" style="width:250px; border-right: solid 1px #000000;">
                    <ul>
                        <legend class="legend_style1">Acount</legend>
                        <hr>
                        <li><a style="color: #0000CD;text-align: left;text-decoration:underline;display: inline-block;" class="" href="Dashbord.php">Dashbord</a></li>
                        <li><a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="view_profile.php">View Profile</a></li>
                        <li><a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="edit_profile.php">Edit Profile</a></li>
                        <li><a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="picutre_uplode.php">Change Profile Picture</a></li>
                        <li><a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="change_password.php">Change Password</a></li>
                        <li><a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="Logout.php">Logout</a></li>
                    </ul>
                </td>
                <td class="td2" style="width:550px; vertical-align:top;">
                    <br>
                    <legend class="legend_style1" ><b>Profile</b></legend>
                    <table border=0 style="width: 500px;">
                      <tr>
                          <td style="width:350px; ">
                            <label >Name: <?php echo $name ?></label>
                            <hr>
                            <br>
                            <label >Email: <?php echo $email ?></label>
                            <hr>
                            <br>
                            <label >Gender: <?php echo $gender ?></label>
                            <hr>
                            <br>
                            <label >Date of birth: <?php echo $dob ?></label>
                            <br>
                            <a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="edit_profile.php">Edit</a>
                          </td>
                          <td style="width:150px">
                            <img src="<?php echo $picture ?>" width="150px" height="150px">
                            <a style="color: #0000CD;text-align: left;text-decoration: underline;display: inline-block;" class="" href="picutre_uplode.php">Change</a>
                          </td>
                      </tr>
                    </table>
                </td>
            </tr>
        </table>
        </div>
    </div>
    
</body>

</html>