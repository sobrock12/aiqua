<?php

    include('view/indexheader.php');

?>

<!-- initial log in page, user will either create a new account or login to existing account -->
<!-- new account creation is passed to createuser.php, logging in is passed to authenticate.php -->

<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <div class="loginForm">

            <h1>Create A New Account</h1>

            <form action="model/createuser.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <label for="confirm">Confirm Password:</label><br>
                <input type="password" id="confirm" name="confirm"><br><br>
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

            <form action="model/authenticate.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <input type="submit" value="Log In" style="padding: 10px";>
            </form>

            </div>
        </div>

    </div>
</div>

<?php

    include('view/footer.php');

?>