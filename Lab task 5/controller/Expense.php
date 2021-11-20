<?php
require_once('model/model.php');
class Expense{

    function AddExpense($title, $amount, $month){
        $model = new Model();

        if($model->insert($title, $amount, $month) == true){
            return true;
        }
        return false;
    }

    function updateExpense($title, $amount, $month, $id){
        $model = new Model();
        if($model->updateExpense($title, $amount, $month, $id) == true){
            return true; 
        }
        
        return false;
    }

    function fetchAllExpense()
    {
        $model = new model();
        $expenses = $model->showAllExpense();
        return $expenses;
    }

    function deleteExpense($id)
    {
        $model = new model();
        $Status = $model->deleteExpense($id);
        if ($Status == true) {
            return true;
        }
        return false;
    }

    function fetchExpense($id)
    {
        $model = new model();
        $expense = $model->showExpense($id);

        $expenseInfo = array();
        foreach ($expense as $rows) {
            $expenseInfo = array(
                'id' => $rows["id"],
                'title' => $rows["title"],
                'amount' => $rows["amount"],
                'month' => $rows["month"],
                'date' => $rows["date"]
            );
            break;
        }

        return $expenseInfo;
    }
}

?>