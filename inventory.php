<?php 

    include('view/header.php')


?>



<div class="container">
    
<h2><b>Inventory</b></h2>

    <div class="row">

        <div class="col-xs-2">

            <div class="buffer">

                <h2>Sort By:</h2>

                    <form>

                        <input type="radio" id="make" name="sortBy" value="make">
                        <label for="make">Make</label><br>
                        <input type="radio" id="model" name="sortBy" value="model">
                        <label for="model">Model</label><br>
                        <input type="radio" id="system" name="sortBy" value="system">
                        <label for="system">System</label><br>
                        <input type="radio" id="price" name="sortBy" value="price">
                        <label for="price">Price</label><br><hr>
                        <input type="radio" id="asc" name="sortChoice" value="asc">
                        <label for="asc">Ascending</label><br>
                        <input type="radio" id="desc" name="sortChoice" value="desc">
                        <label for="desc">Descending</label><br>
                        <input type="submit" class="mySort" value="Sort!">

                    </form>
            
            </div>

        </div>

        <div class="col-xs-8">

            <div class="buffer">

            <table>

                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>System</th>
                    <th>Price</th>
                </tr>

                <tr>
                    <td>Garmin</td>
                    <td>Controller</td>
                    <td>GFC500</td>
                    <td>$7,995</td>
                </tr>

            </table>


            </div>

        </div>

        <div class="col-xs-2">

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

                <input type="button" class="myButton" value="Delete Item"><br>

            </div>

        </div>
        
    </div>

</div>