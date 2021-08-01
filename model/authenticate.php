<?php
echo "<body style='background-color:#A6CBFC'>";


require 'database.php';

if ( !isset($_POST['username'], $_POST['password']) ) {

	exit('Please fill both the username and password fields!');

}

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = $login_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter username.";
        echo $username_err;

    } else{

        $username = trim($_POST["username"]);

    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){

        $password_err = "Please enter your password.";
        echo $password_err;

    } else{

        $password = trim($_POST["password"]);

    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){

        // Prepare a select statement
        $sql = "SELECT id, username, password FROM accounts WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){

                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to quote selection page
                            echo "Logged In successfully! Continuing to Quote Selection page in 5 seconds...";

                            header( "refresh:5; url=../select.php");
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                            echo $login_err;

                        }
                    }
                } else{

                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                    echo $login_err;

                }
            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);

}
?>
