<?php

    include('view/header.php');

    require('model/database.php');

    
    //SQL query to get quotes tied to currently logged in account

    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM quotes WHERE acctID = :acctID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $quotes = $statement->fetchAll();
    $statement->closeCursor();

?>

<!-- 
    html displays quotes tied to account loaded from SQL database 
    user can create a new quote via Bootstrap modal form
    user can select a quote to view
    user can delete a quote listed
-->

<div class="container">
    <div class="row">
        <div class="col-xs-2">

            <br><br><br><br><br><br><br>

        </div>
        <div class="col-xs-8">

            <div class="buffer">

                <?php if(sizeof($quotes) == 0) : ?>

                    <h5>You don't have any quotes started. Click the "Create a new Quote"
                         on the right to start</h5>

                <?php else : ?>

                    <table id = "table">
                    <thead>
                        <tr>
                            <th>Customer/Quote Name</th>
                            <th>Tail #</th>
                            <th>Contact #</th>
                            <th>Load</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($quotes as $quote) : ?>
                        <tr>
                            <td><?php echo $quote['quoteName']; ?></td>
                            <td><?php echo $quote['tailNum']; ?></td>
                            <td><?php echo $quote['contact']; ?></td>
                            <td><a href="quote.php?quoteID=<?php echo $quote['quoteID'];?>"><img src="misc/open.jpg" alt="Load This Quote" width="32" height="32"></a></td>
                            <td><a href="delete.php?quoteID=<?php echo $quote['quoteID'];?>"><img src="misc/delete.png" alt="Delete This Quote" width="32" height="32"></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>

                <?php endif; ?>

            </div>
        </div>
        <div class="col-xs-2">

        <br><br><br><br><br><br><br>    

                <input type="button" class="myButton" value="Create a new Quote!" data-toggle="modal" data-target="#exampleModalCenter"><br>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle"><b>Create a new Quote...</b></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <form action="model/quoteadd.php" method="post">
                                        <label for="name">Customer/Quote Name: </label><br>
                                        <input type="text" id="name" name="name"><br><br>
                                        <label for="tailnum">Tail #: </label><br>
                                        <input type="text" id="tailnum" name="tailnum"><br><br>
                                        <label for="contact">Contact #:</label><br>
                                        <input type="text" id="contact" name="contact"><br><br>
                                        <input type="submit" value="Add Quote" style="padding: 10px";>
                                    </form>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>


            
                
        </div>
    </div>
</div>

<?php

    include('view/footer.php');

?>
