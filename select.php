<?php

    include('view/header.php');

    require('model/database.php');

    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM quotes WHERE acctID = :acctID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $quotes = $statement->fetchAll();
    $statement->closeCursor();

?>

<div class="container">
    <div class="row">
        <div class="col-xs-2">

            <br><br><br><br><br><br><br>

                <h3>Click on a quote to select it, then choose an option from the right.</h3>

            
        </div>
        <div class="col-xs-8">
            <div class="purpleBack">
                <input type="text" placeholder="Search...">
                <button type="submit">Submit</button>
            </div>

            <div class="buffer">

                <table>
                <thead>
                    <tr>
                        <th>Customer/Quote Name</th>
                        <th>Tail #</th>
                        <th>Contact #</th>
                        <th>Date Created</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($quotes as $quote) : ?>
                    <tr>
                        <td><?php echo $quote['quoteName']; ?></td>
                        <td><?php echo $quote['tailNum']; ?></td>
                        <td><?php echo $quote['contact']; ?></td>
                        <td><?php echo $quote['date']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>

            </div>
        </div>
        <div class="col-xs-2">

        <br><br><br><br><br><br><br>    

                <input type="button" class="myButton" value="Load this Quote!">
                <input type="button" class="myButton" value="Delete this Quote!"><br>

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
