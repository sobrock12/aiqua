<?php
session_start();

//this page handles associating selected inventory item with currently selected quote

require('database.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $invID = filter_input(INPUT_GET, 'invID');

    $quoteID = $_SESSION['quoteID'];

    $acctID = $_SESSION['id'];

    $query = 'INSERT INTO quoteditems
                (invID, quoteID, acctID)
                VALUES
                (:invID, :quoteID, :acctID)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':invID', $invID);
    $statement->bindValue(':quoteID', $quoteID); 
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $statement->closeCursor();

    header('location: ../quote.php?quoteID='.$quoteID);
}

?>