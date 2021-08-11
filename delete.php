<?php
include('view/header.php');

require('model/database.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $quoteID = filter_input(INPUT_GET, 'quoteID');
    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM quotes WHERE quoteID = :quoteID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':quoteID', $quoteID);
    $statement->execute();
    $quoteLoaded = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($quoteLoaded as $quoteLoad){

        $quotedAcct = $quoteLoad['acctID'] ?? '';

    }

    if ($quotedAcct != $acctID) {

        header('location: select.php');

    }

}

?>

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