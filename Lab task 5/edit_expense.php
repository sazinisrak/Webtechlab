<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    require_once 'controller/Expense.php';

    $expenseInfo = array(
        'id' => "",
        'title' => "",
        'amount' => "",
        'month' => "",
        'date' => ""
    );
    $expense = new Expense();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $expenseInfo = $expense->fetchExpense($_GET["id"]);
    }

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

        if (empty($title)) {
            $titleError = "This field is required.";
        }

        if (empty($amount)) {
            $amountError = "This field is required.";
        }

        if (empty($month)) {
            $monthError = "This field is required.";
        }

        if (!empty($monthError) || !empty($titleError) || !empty($amountError)) {
        } else {
            $expense = new Expense();
            
            if ($expense->updateExpense($title, $amount, $month, $expenseInfo["id"]) == true) {
                $status =  "Successfully Updated.";
                header("location:all_expenses.php");

            } else {
                $status =  "Sorry! There was a problem updating your data.";
            }
        }
    }
    ?>
</head>

<body>
    <h3>Edit Expense Record</h3>
    <p><?php echo $status; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <b>ID: <?php echo $expenseInfo["id"]; ?></b><br>
        <b>Submission Date: <?php echo $expenseInfo["date"]; ?></b><br><br>

        <label for="title">Expense Title</label><br>
        <input type="text" id="title" name="title" value="<?php echo $expenseInfo["title"]; ?>"><br>
        <span style="color: red;"><?php echo $titleError ?></span><br>

        <label for="amount">Amount</label><br>
        <input type="text" id="amount" name="amount" value="<?php echo $expenseInfo["amount"]; ?>"><br>
        <span style="color: red;"><?php echo $amountError ?></span><br>

        <label for="month">Month</label><br>
        <input type="text" id="month" name="month" value="<?php echo $expenseInfo["month"]; ?>"><br>
        <span style="color: red;"><?php echo $monthError ?></span><br>

        <br><button type="submit">Update</button>
    </form>
</body>
</body>

</html>