<?php
echo "<body style='background-color:#A6CBFC'>";

//handles user log in

require 'database.php';

if ( !isset($_POST['username'], $_POST['password']) ) {

	exit('Please fill both the username and password fields!');

}

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: select.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){

        $username_err = "Please enter username.";
        echo $username_err;

    } else{

        $username = trim($_POST["username"]);

    }
    
    if(empty(trim($_POST["password"]))){

        $password_err = "Please enter your password.";
        echo $password_err;

    } else{

        $password = trim($_POST["password"]);

    }
    
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password 
                FROM accounts 
                WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            $param_username = trim($_POST["username"]);
            

            if($stmt->execute()){
                //checks if username exists, if yes then verify password
                if($stmt->rowCount() == 1){

                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            //if password is correct, new session is started
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            echo "Logged In successfully! Continuing to Quote Selection page in 5 seconds...";

                            header( "refresh:5; url=../select.php");
                            
                        } else{

                            $login_err = "Invalid username or password.";
                            echo $login_err;

                        }
                    }
                } else{

                    $login_err = "Invalid username or password.";
                    echo $login_err;

                }
            } else{

                echo "Something went wrong. Please try again later.";

            }

            unset($stmt);
        }
    }
    
    unset($pdo);

}
?>
