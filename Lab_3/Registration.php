<?php
$nameErr = $emailErr = $dayErr = $monthErr =  $yearErr =  $unErr = $passErr = $genderErr = ""  ;
$name = $email = $day = $month = $year = $un = $pass = $pass2 = $gender= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $name=test_input($_POST["name"]);
  $un=test_input($_POST["un"]);
  $pass=test_input($_POST["pass"]);
  $pass2=test_input($_POST["pass2"]);
  $day=(int)test_input($_POST["day"]);
  $month=(int)test_input($_POST["month"]);
  $year=(int)test_input($_POST["year"]);


    if (empty($_POST["name"])) 
      {
       $nameErr = "Name is required";
      } 
      else{
        if((str_word_count($name))<2){
            $nameErr="The name must have at least two word";
        }
        else{
            if((preg_match("/[A-Za-z]/", $name[0]))==0){
                $nameErr="The name must have start with litter";  
            }
            else
            {
              if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1){
                $nameErr="Name can contain letter,desh,dot and space";  
              }
            }
        }
       }
     }

      if((empty($_POST["email"])))
      {
        $emailErr = "email is required";
      }
      else
      {
        $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
          {
            $emailErr = "Invalid email format";
          }
      }
      if ((empty($_POST["un"]))) 
      {
        $unErr= "enter user name";
      }
      else
      {
         if((str_word_count($name))<2){
            $nameErr="The name must have at least two word";
        }
        else{
            if((preg_match("/[A-Za-z]/", $name[0]))==0){
                $nameErr="The name must have start with litter";  
            }
            else
            {
              if(preg_match( '/^[A-Za-z\s._-]+$/', $name)!==1)
              {
                $nameErr="Name can contain letter,desh,dot and space";  
              }

            }
      }
    }
      if ((empty($_POST["pass"]))) 
      {
        $passErr=" enter password";
      }
      else
      {
        if(strcasecmp($pass, $pass2)==1)
        {
          $passErr="password does not match";
        }

      }
      if((empty($_POST["day"])) ||(empty($_POST["month"]))||(empty($_POST["year"])))
      {
        $dayErr = "days is required";
      }
      else
      {
        if($day < 32 and $day > 0 )
        {
          if($month <13 and $month >0)
          {
          }
          else
          {
            $monthErr = "month invalid";
          }
        }
        else
        {
          $dayErr = "days invalid";
        }
        
      }

      if (empty($_POST["gender"])) 
      {
        $genderErr = "Gender is required";
      } 
      else 
      {
        $gender = test_input($_POST["gender"]);
      }

      if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["un"]) && !empty($_POST["pass"]) &&   !empty($_POST["day"]) && !empty($_POST["month"]) && !empty($_POST["year"]) && !empty($_POST["gender"])) 
      {
        echo "this id test";
        if(file_exists('data.json'))  
       {  
        $current_data = file_get_contents('data.json');  
        $array_data = json_decode($current_data, true);  
        $extra = array(  
             'name'               =>     $_POST['name'],  
             'email'          =>     $_POST["email"],  
             'un'     =>     $_POST["un"],
             'pass'     =>     $_POST["pass"],   
             'gender'     =>     $_POST["gender"],  
             'day'     =>     $_POST["day"],
             'month'     =>     $_POST["month"], 
             'year'     =>     $_POST["year"]   
        );  
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('data.json', $final_data))  
        {  
             $message = "<label class='text-success'>File Appended Success fully</p>";  
        }  
       }  
       else  
       {  
            $error = 'JSON File does not exist';  
       }
      
        //

     
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
  <title></title>
  
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <div>
      <h2>SUBMIT INFORMATION</h2>
      <div  >
        <label> Name: 
        <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        </label>
        <br><br>
      </div>

      <div>
        <label> Email: 
        <input type="text" name="email" value="<?php echo $email;?>" >
        <span class="error">* <?php echo $emailErr;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> User Name: 
        <input type="text" name="un" value="<?php echo $un;?>" >
        <span class="error">* <?php echo $unErr;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> Password: 
        <input type="Password" name="pass" value="<?php echo $pass;?>" >
        <span class="error">* <?php echo $passErr;?></span>
        </label>
        <br><br>
      </div>
      <div>
        <label> Retype Password: 
        <input type="Password" name="pass2" value="<?php echo $pass2;?>" >
        <span class="error">* <?php echo $passErr;?></span>
        </label>
        <br><br>
      </div>

      <div>
        <label> Date Of Birth: 
      <input type="number" name="day" value="<?php if($day==0){}else{echo $day;}?>" style="width: 5%; font-size: 14px;">  /
      <input type="number" name="month" value="<?php if($month==0){}else{echo $month;}?>" style="width: 5%; font-size: 14px;">/
      <input type="number" name="year" value="<?php if($year==0){}else{echo $year;}?>" style="width: 10%; font-size: 14px;">
      <span class="error">* <?php echo $dayErr;?></span>
      <span ><?php echo $monthErr;?></span>
      <span > <?php echo $yearErr;?></span>
      </label>
      <br><br>
      </div>

      <div>
      <label >Gender : <br>
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked"?> value="male">Male
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked"?> value="Female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked"?> value="other">Other
      <span class="error">*<?php echo $genderErr;?></span>
      </label>
      <br><br>
      </div>
       <div>
        <input type="submit" name="submit" value="Submit" >
       </div>
    </div>  
  </form>
</body>
</html>