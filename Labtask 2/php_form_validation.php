<html>
<title>Form Validation</title>

<body>
    <?php

    $name = $email = $gender = $degree = $bg = $dob = "";

    $day = $month = $year = 0;
    
    $nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bg_err = "";

    if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        $word_count = $_POST["name"];
        $day = $_POST["day"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $dc = 0;

        if (!empty($_POST["degree"])) {
            foreach ($_POST["degree"] as $select) {
                $dc++;
            }
        }

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_Input($_POST["name"]);
            if ((!preg_match("/^[a-zA-Z-' ]*$/", $name)) or (str_word_count($word_count) < 2)) {
                $nameErr = "Alphabets only and write at least two words";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_Input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email is invalid";
            }
        }     

        if ((empty($_POST["day"])) or (empty($_POST["month"])) or (empty($_POST["year"]))) {
            $dobErr = "Enter all the fields";
        }
        if ($day >= 1 and $day <= 31) {
            if($month >= 1 and $month <= 12){
                if($year >= 1953 and $year <= 1998){
                    $dob = test_Input($month);
                }
            }
        } else {
            $dobErr = "Invalid Date Format";
        }

        if (empty($_POST["gender"])) {
            $genderErr = "At least one needs to be selected";
        } else {
            $gender =test_Input($_POST["gender"]);
        }
        if (empty($_POST["degree"])) {
            $degreeErr = "Degree Required";
        }
        if ($dc >= 2) {
            $degree = $_POST["degree"];
        } else {
            $degreeErr = "Please check at least two boxes";
        }
        if (empty($_POST["bloodgroup"])) {
            $bg_err = "Select at least one";
        } else {
            $bg =test_Input($_POST["bloodgroup"]);
        }
    }
    function test_Input($information)
    {
        $information = trim($information);
        $information = stripslashes($information);
        $information = htmlspecialchars($information);
        return $information;
    }
    ?>
    <div>
    <h1><b>PHP FORM VALIDATION<b></h1>
    </div><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div>
                <label>NAME </label>
                <input type="text" id="name" name="name"><span style="color: red;">
                    <?php if ($nameErr!="") {
                        echo "<b> * ".$nameErr."<b>";
                    }
                    ?>
                </span>
            </fieldset>
        </div><br>
        <div>           
                <label>EMAIL  </label>
                <input type="text" id="email" name="email"><span style="color: red;">
                    <?php if ($emailErr!="") {
                        echo "<b> * ".$emailErr."<b>";
                    }
                    ?>
                </span>

        </div><br>
        <div>
                <label>DOB&nbsp;</label>
                dd <input type="text" id="day" name="day"> /
                yy <input type="text" id="month" name="month"> /
                mm <input type="text" id="year" name="year"> <span style="color: red;">
                    <?php if ($dobErr != "") {
                        echo "<b> * ".$dobErr."<b>";
                    }
                    ?>
                </span>

        </div><br>
        <div>
                <label>GENDER&nbsp;</label>
                <input type="radio" id="gender" name="gender" value="Male"> Male
                <input type="radio" id="gender" name="gender" value="Female"> Female
                <input type="radio" id="gender" name="gender" value="Other"> Other <span style="color: red;">
                    <?php
                    if ($genderErr != "") {
                        echo "<b> * ".$genderErr."<b>";
                    }
                    ?>
                </span>
            </fieldset>
        </div><br>
        <div>
                <label>DEGREE&nbsp;</label>
                <input type="checkbox" id="degree" name="degree[]" value="SSC"> SSC
                <input type="checkbox" id="degree" name="degree[]" value="HSC"> HSC
                <input type="checkbox" id="degree" name="degree[]" value="BSc"> BSc
                <input type="checkbox" id="degree" name="degree[]" value="MSc"> MSc <span style="color: red;">
                    <?php
                    if ($degreeErr != "") {
                        echo "<b> * ".$degreeErr."<b>";
                    }
                    ?>
                </span>
            </fieldset>
        </div><br>
        <div>
                <label>BLOOD GROUP&nbsp;</label>
                <select name="bloodgroup">
                    <option disabled selected value></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                </select>
                <span style="color: red;">
                    <?php
                    if ($bg_err!="") {
                        echo "<b> * ".$bg_err."<b>";
                    }
                    ?>
                </span>
        </div><br>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>