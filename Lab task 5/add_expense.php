<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>


    <?php

    $titleError = $amountError = $monthError = $status = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        require_once 'controller/Expense.php';

        $title = test_input($_POST["title"]);
        $amount = test_input($_POST["amount"]);
        $month = test_input($_POST["month"]);

        if(empty($title)) {
            $titleError = "This field is required.";
        }
        
        if(empty($amount)) {
            $amountError = "This field is required.";
        }

        if(empty($month)) {
            $monthError = "This field is required.";
        }

        if(!empty($monthError) || !empty($titleError) || !empty($amountError)){
            
        }
        else
        {
            $expense = new Expense();
            if($expense->AddExpense($title, $amount, $month) == true){
                $status =  "Successfully Added.";
            }
            else
            {
                $status =  "Sorry! There was a problem inserting your data.";
            }
        }
        
    }
    ?>

</head>

<body>
    <h3>Add Expense</h3>
    <p><?php echo $status; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="title">Expense Title</label><br>
        <input type="text" id="title" name="title"><br>
        <span style="color: red;"><?php echo $titleError ?></span><br>

        <label for="amount">Amount</label><br>
        <input type="text" id="amount" name="amount"><br>
        <span style="color: red;"><?php echo $amountError ?></span><br>

        <label for="month">Month</label><br>
        <input type="text" id="month" name="month"><br>
        <span style="color: red;"><?php echo $monthError ?></span><br>

        <br><button type="submit">Submit</button>
    </form>
</body>

</html>