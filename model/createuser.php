<?php

//handles account creation.

echo "<body style='background-color:#A6CBFC'>";
session_start();

require 'database.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if ( !isset($_POST['username'], $_POST['password'], $_POST['confirm']) ) {
        
        echo 'Please fill out all fields!';

    }

    elseif(!preg_match('/^[A-Za-z0-9]*$/', trim($_POST["username"]))){

        $username_err = "Username can only contain letters and numbers.";
        echo $username_err;

    }elseif(empty(trim($_POST["username"]))){

        $username_err = "Please enter a username.";
        echo $username_err;

}else{

        $sql = "SELECT id FROM accounts 
                WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){

                if($stmt->rowCount() == 1){

                    $username_err = "This username is already taken.";
                    echo $username_err;

                } else {

                    $username = trim($_POST["username"]);

                }

            } else {

                echo "Something went wrong. Please try again later.";

            }

            unset($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){

        $password_err = "Please enter a password.";    
        echo $password_err;

    } elseif(strlen(trim($_POST["password"])) < 6){

        $password_err = "Password must have atleast 6 characters.";
        echo $password_err;

    } else {

        $password = trim($_POST["password"]);

    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm"]))){

        $confirm_password_err = "Please confirm password.";  
        echo $confirm_password_err;

    } else{

        $confirm_password = trim($_POST["confirm"]);

        if(empty($password_err) && ($password != $confirm_password)){

            $confirm_password_err = "Password did not match.";
            echo $confirm_password_err;

        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO accounts 
                (username, password) 
                VALUES 
                (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: ../view/createusersuccess.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);

}

?>
