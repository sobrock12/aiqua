<?php

    include('header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="loginForm">

            <h1>Create A New Account</h1>

            <form>
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br><br>
                <label for="pw">Password:</label><br>
                <input type="text" id="pw" name="pw"><br><br>
                <label for="confirm">Confirm Password:</label><br>
                <input type="text" id="confirm" name="confirm"><br><br>
                <input type="submit" value="Create Account" style="padding: 10px";>
            </form> 

            </div>

        </div>    

        <div class="col-xs-4">
            

            <h3>or...</h3> 

            
        </div>

        <div class="col-xs-4">
            <div class="loginForm">

            <h1>Log In</h1>

            <form>
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email"><br><br>
                <label for="pw">Password:</label><br>
                <input type="text" id="pw" name="pw"><br><br>
                <input type="submit" value="Log In" style="padding: 10px";>
            </form>

            </div>
        </div>

    </div>
</div>

<?php

    include('footer.php');

?>