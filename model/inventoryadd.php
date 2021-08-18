<?php

//this page receives new inventory item info via POST, creates new inventory entry in database

session_start();

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $make = filter_input(INPUT_POST, 'make');
    $model = filter_input(INPUT_POST, 'model');
    $system= filter_input(INPUT_POST, 'system');
    $price = filter_input(INPUT_POST, 'price');
    $acctID = $_SESSION['id'];

    $query = 'INSERT INTO inventory 
                    (make, model, system, price, acctID)
                VALUES
                    (:make, :model, :system, :price, :acctID)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':system', $system);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $statement->closeCursor();

    header('location: ../inventory.php');
}

?>