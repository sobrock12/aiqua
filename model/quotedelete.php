<?php

//this page is reached after user has confirmed a quote is to be deleted.
//deletes selected quote, reroutes to quote selection screen

session_start();

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $quoteID = filter_input(INPUT_POST, 'quoteID');

    $query = 'DELETE FROM quotes WHERE quoteID = :quoteID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':quoteID', $quoteID);
    $statement->execute();
    $statement->closeCursor();

    header('location: ../select.php');

}

?>