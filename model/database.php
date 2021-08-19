<?php

//database connection page

//localhost connection
//$pdo = 'mysql:host=localhost;dbname=quoteProj';
//$username= 'root';
//$password = '';

$pdo = 'mysql:host=pk1l4ihepirw9fob.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=dgzo1i9cdhmlwbqm';
$username = 'l13z3mmjmtw4hace';
$password = 'vutx627w3bkh9qff';

try {
    //local development server connection
    //if using a $password, add it as 3rd parameter
    $pdo = new PDO($pdo, $username);

} catch (PDOException $e) {

    echo "DB connection failed.";

}
?>