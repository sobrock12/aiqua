<?php

//logout.php page displays for 5 seconds after user clicks "Log Out" in top navbar
//user is rerouted to login page

include 'logoutheader.php'

?>

<?php
echo "<body style='background-color:#A6CBFC'>";

session_start();
session_destroy();
// Redirect to the login page:
echo ' You are now logged out. Redirecting to Log In page in 5 seconds...';
            header( "refresh:5;url=../index.php" );
?>