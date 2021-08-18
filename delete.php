<?php
include('view/header.php');

require('model/database.php');


//SQL query to load selected quote info 

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $quoteID = filter_input(INPUT_GET, 'quoteID');
    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM quotes WHERE quoteID = :quoteID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':quoteID', $quoteID);
    $statement->execute();
    $quoteLoaded = $statement->fetchAll();
    $statement->closeCursor();


    //if the user account associated with the quoteID passed via GET 
    //does not match currently logged in account, user is rerouted back to select.php page

    foreach ($quoteLoaded as $quoteLoad){

        $quotedAcct = $quoteLoad['acctID'] ?? '';

    }

    if ($quotedAcct != $acctID) {

        header('location: select.php');

    }

}

?>

<!-- 
    delete.php page is used to confirm that user does indeed want to delete the selected quote
    upon clicking submit, currently selected quoteID is passed to quotedelete.php
-->

<div class="container">

    <h2><b>Delete this Quote?</b></h2><br>

        <?php foreach ($quoteLoaded as $quoteLoad) : ?>

            <b>Quote Name: </b><?php echo $quoteLoad['quoteName']; ?><br>
            <b>Tail #: </b><?php echo $quoteLoad['tailNum']; ?><br>
            <b>Contact #: </b><?php echo $quoteLoad['contact']; ?><br>
            <b>Date Created: </b><?php echo $quoteLoad['date']; ?><br>

        <?php endforeach; ?>

            <form action="model/quotedelete.php" method="post">
                <input type="hidden" id="quoteID" name="quoteID" value="<?php echo $quoteID; ?>">
                <input type="submit" value="Delete Quote">
            </form>
</div>