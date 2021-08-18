<?php

//this page handles deleting an item from currently loaded quote

session_start();

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $itemID = filter_input(INPUT_GET, 'itemID');

    $quoteID = $_SESSION['quoteID'];

    $query = 'DELETE FROM quoteditems WHERE itemID = :itemID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':itemID', $itemID);
    $statement->execute();
    $statement->closeCursor();

    header('location: ../quote.php?quoteID='.$quoteID);
}

?>