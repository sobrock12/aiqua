<?php
session_start();

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $invID = filter_input(INPUT_GET, 'invID');
    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM inventory WHERE invID = :invID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':invID', $invID);
    $statement->execute();
    $invDeleting = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($invDeleting as $invDel){

        $invAcct = $invDel['acctID'] ?? '';

    }

    if ($invAcct != $acctID) {

        header('location: ../inventory.php');

    } else {

        $query = 'DELETE FROM inventory WHERE invID = :invID';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':invID', $invID);
        $statement->execute();
        $statement->closeCursor();

        header('location: ../inventory.php');

    }


}
?>