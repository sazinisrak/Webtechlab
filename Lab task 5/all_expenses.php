<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <?php
    require_once 'controller/Expense.php';

    $controller = new Expense();
    $expenseInfo = $controller->fetchAllExpense();

    if (isset($_GET['id']) && !empty($_GET['id'])) {

        if ($controller->deleteExpense($_GET['id'])) {
            header('Location: all_expenses.php?status=deleted');
        }
    }
    ?>

    <table style="width:100%;">
    <h3>All Expense Log</h3>
        <thead">
            <tr>
                <th>ID</th>
                <th>Expense Title</th>
                <th>Amount</th>
                <th>Month</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($expenseInfo as $row) : ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["month"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td>
                            <button type="button"  onclick="window.location.href='edit_expense.php?id=<?php echo $row['id'] ?>'">View and Edit</button>
                            <button type="button"  onclick="window.location.href='all_expenses.php?id=<?php echo $row['id'] ?>'">Delete</button>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</body>

</html>