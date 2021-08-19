<?php

    //if user is not logged in, session has not started therefore user is rerouted back to login page

    session_start();

    if (!isset($_SESSION['loggedin'])) {

	    header('Location: index.php');

	exit;
}
?>

<!-- 
    this header is used when user is logged in and session is active, includes navbar
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avionics Installation Quote Assistant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />

</head>
   
    <nav class="navtop">

        <div>
            Welcome, <?=$_SESSION['username']?>
            <a href="select.php">Quote Selection</a>
            <a href="inventory.php">Manage Inventory</a>
            <a href="view/logout.php">Logout</a>

        </div>

    </nav> 
        
    <header>

        <h1>Avionics Installation Quote Assistant</h1>

    </header>

