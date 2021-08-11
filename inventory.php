<?php 

    include('view/header.php');

    require('model/database.php');

    $acctID = $_SESSION['id'];

    $query = 'SELECT * FROM inventory WHERE acctID = :acctID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $invItems = $statement->fetchAll();
    $statement->closeCursor();

?>



<div class="container">
    
<h2><b>Inventory</b></h2>

    <div class="row">

        <div class="col-xs-2">

        <br><br><br><br><br><br><br>



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
                            <th>Make</th>
                            <th>Model</th>
                            <th>System</th>
                            <th>Price</th>
                            <th>Delete</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($invItems as $invItem) : ?>
                        <tr>
                            <td><?php echo $invItem['make']; ?></td>
                            <td><?php echo $invItem['model']; ?></td>
                            <td><?php echo $invItem['system']; ?></td>
                            <td><?php echo $invItem['price']; ?></td>
                            <td><a href="model/inventorydelete.php?invID=<?php echo $invItem['invID'];?>"><img src="misc/delete.png" alt="Delete Item" width="32" height="32"></a></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="col-xs-2">

        <br><br><br><br><br><br><br>


            <div class="buffer">

                <input type="button" class="myButton" value="Add Item" data-toggle="modal" data-target="#exampleModalCenter"><br>

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle"><b>Add an item to your inventory...</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form action="model/inventoryadd.php" method="post">
                                    <label for="make">Make: </label><br>
                                    <input type="text" id="make" name="make"><br><br>
                                    <label for="model">Model: </label><br>
                                    <input type="text" id="model" name="model"><br><br>
                                    <label for="system">System:</label><br>
                                    <input type="text" id="system" name="system"><br><br>
                                    <label for="price">Price: </label><br>
                                    <input type="text" id="price" name="price"><br><br>
                                    <input type="submit" value="Add Item" style="padding: 10px";>
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

</div>