<?php

//page confirming successful user creation, reroutes back to index.php page for login

echo "<body style='background-color:#A6CBFC'>";
session_start();

echo "New user created successfully! Continuing to Log In page in 5 seconds...";

header( "refresh:5; url=../index.php");
?>