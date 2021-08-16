<?php

    include('view/header.php');

    require('model/database.php');

    $subtotal = 0;

    $acctID = $_SESSION['id'];

    $quoteID = filter_input(INPUT_GET, 'quoteID');

    $_SESSION['quoteID'] = $quoteID;

    if ($_SESSION['quoteID'] == ''){

        header('location: select.php');

    }

    $query = 'SELECT * FROM inventory WHERE acctID = :acctID';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':acctID', $acctID);
    $statement->execute();
    $invItems = $statement->fetchAll();
    $statement->closeCursor();


    $quotetoload = filter_input(INPUT_GET, 'quoteID');
    $query2 = 'SELECT i.make, i.model, i.system, i.price, q.itemID, q.invID FROM inventory AS i 
                    INNER JOIN quoteditems AS q ON i.invID = q.invID 
                    WHERE q.quoteID = :quoteID';
    $statement = $pdo->prepare($query2);
    $statement->bindValue(':quoteID', $quoteID);
    $statement->execute();
    $quotedItems = $statement->fetchAll();
    $statement->closeCursor();

?>

<div class="container-fluid">

    <div class="row">

        <div class="col-xs-4">

            <div class="buffer">

                <h4><b>Items from Inventory</b></h4>


                <?php if(sizeof($invItems) == 0) : ?>

                    <h5>You don't have any inventory items to display! Click "Manage Inventory" 
                        at the top of the page to add inventory items to your profile.</h5>

                <?php else : ?>

                    <table>

                        <thead>

                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>System</th>
                                <th>Price</th>
                                <th>Quote It!</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($invItems as $invItem) : ?>
                            <tr>
                                <td><?php echo $invItem['make']; ?></td>
                                <td><?php echo $invItem['model']; ?></td>
                                <td><?php echo $invItem['system']; ?></td>
                                <td><?php echo $invItem['price']; ?></td>
                                <td><a href="model/addtoquote.php?invID=<?php echo $invItem['invID'];?>"><img src="misc/plus.png" alt="Add to Quote" width="32" height="32"></a></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>

                        </table>

                <?php endif; ?>

            </div>

        </div>

        <div class="col-xs-4">

        <div class="buffer">

            <h4><b>Items in Quote</b></h4>

            <?php if(sizeof($quotedItems) == 0) : ?>

                <h5>You don't have any items added to this quote!  Click the "Plus" icon in 
                    the Inventory table to add an inventory item to this quote.
                </h5>

            <?php else : ?>

                <table>

                    <thead>

                        <tr>
                            <th>Make</th>
                            <th>Model</th>
                            <th>System</th>
                            <th>Price</th>
                            <th>Remove It!</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($quotedItems as $quotedItem) : ?>
                        <tr>
                            <td><?php echo $quotedItem['make']; ?></td>
                            <td><?php echo $quotedItem['model']; ?></td>
                            <td><?php echo $quotedItem['system']; ?></td>
                            <td><?php echo $quotedItem['price'];  $subtotal += $quotedItem['price']; ?></td>
                            <td><a href="model/deletefromquote.php?itemID=<?php echo $quotedItem['itemID'];?>"><img src="misc/minus.png" alt="Remove from Quote" width="32" height="32"></a></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>

            <?php endif; ?>


        </div>

        </div>

        <div class="col-xs-4">

            <div class="buffer">

                <h4 id="subtotal">Subtotal:.....<?php echo $subtotal; ?></h4><br>

                <h6><b>Labor Cost Multiplier...</h6></b>
                <h6>(Enter your percentages as decimals, ex. 25% as 0.25)</h6>
                <input type="text" id="multiplier" name="multiplier" size="5">


                <button type="button" onClick="calculateTotal()" />Calculate</button> 

                <h3><b>Total:.....</b></h3><br>

            </div>

        </div>
        

    </div>


</div>