<?php

//localhost connection
$pdo = 'mysql:host=localhost;dbname=quoteProj';
$username= 'root';
$password = '';

try {
    //local development server connection
    //if using a $password, add it as 3rd parameter
    $pdo = new PDO($pdo, $username);

} catch (PDOException $e) {

    echo "DB connection failed.";

}
?>