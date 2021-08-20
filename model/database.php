<?php

//database connection page

//localhost connection
//$pdo = 'mysql:host=localhost;dbname=quoteProj';
//$username= 'root';
//$password = '';

//ClearDB connection
$pdo = 'mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_778b37347365d17';
$username = 'b49c47ccddc431';
$password = '9b34bf5a';

try {
    //local development server connection
    //if using a $password, add it as 3rd parameter
    $pdo = new PDO($pdo, $username, $password);

} catch (PDOException $e) {

    echo "DB connection failed.";

}
?>