<?php
require_once 'db_connect.php';

class Model
{
    function insert($title, $amount, $month)
    {
        $conn = db_conn();
        $selectQuery = "INSERT into expense_log (title, amount, month, date)
        VALUES (:title, :amount,:month, now())";
        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([
                ':title' => $title,
                ':amount' => $amount,
                ':month' => $month
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $conn = null;
            return false;
        }

        $conn = null;
        return true;
    }

    function updateExpense($title, $amount, $month, $id)
    {
        $conn = db_conn();
        $selectQuery = "UPDATE expense_log set title = ?, amount = ?, month = ? where id = ?";
        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([
                $title, $amount, $month, $id
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $conn = null;
        return true;
    }

    function showAllExpense()
    {
        $conn = db_conn();
        $selectQuery = 'SELECT * FROM `expense_log` ';
        try {
            $stmt = $conn->query($selectQuery);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    function deleteExpense($id)
    {
        $conn = db_conn();
        $selectQuery = "DELETE FROM `expense_log` WHERE `id` = ?";
        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $conn = null;
        return true;
    }

    function showExpense($id)
    {
        $conn = db_conn();
        $selectQuery = 'SELECT * FROM `expense_log` where id = ?';
        try {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
