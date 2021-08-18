<?php

//this page takes in new quote info entered by user via POST, creates new quote entry in database

session_start();

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = filter_input(INPUT_POST, 'name');
    $tailnum = filter_input(INPUT_POST, 'tailnum');
    $contact = filter_input(INPUT_POST, 'contact');
    $acctID = $_SESSION['id'];

    $query = 'INSERT INTO quotes
                (quoteName, tailNum, contact, acctID) 
              VALUES 
                (:name, :tailnum, :contact, :acctID)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':tailnum', $tailnum);
    $statement->bindValue(':contact', $contact);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $statement->closeCursor();

    header('location: ../select.php');
    
}

?>