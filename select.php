<?php

    include('view/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-xs-2">
            
                <h2>Sort By:</h2>
                <form>
                    <input type="radio" id="asc" name="sortChoice" value="asc">
                    <label for="asc">Ascending</label><br>
                    <input type="radio" id="desc" name="sortChoice" value="desc">
                    <label for="desc">Descending</label><br>
                    <input type="submit" class="mySort" value="Sort!">
                </form>
            
        </div>
        <div class="col-xs-8">
            <div class="purpleBack">
                <input type="text" placeholder="Search...">
                <button type="submit">Submit</button>
            </div>
                <table>
                    <tr>
                        <th>Customer/Quote Name</th>
                        <th>Tail #</th>
                        <th>Contact #</th>
                        <th>Date Created</th>
                        <th>Other Info</th>
                    </tr>
                    <tr>
                        <td>Flying Co.</td>
                        <td>N123XD</td>
                        <td>123-4567</td>
                        <td>6/22/21</td>
                        <td>GFC500</td>
                    </tr>
                </table>
        </div>
        <div class="col-xs-2">

            
                <input type="button" class="myButton" value="Load this Quote!"><br>
                <input type="button" class="myButton" value="Delete this Quote!"><br>
                <input type="button" class="myButton" value="Create a new Quote!"><br>
            
                
        </div>
    </div>
</div>

<?php

    include('view/footer.php');

?>
