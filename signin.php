<?php

$methodType = $_SERVER['REQUEST_METHOD'];

if ($methodType === 'POST') {

    $servername = "localhost";
    $dblogin = "justince_team5";
    $password = "Team5!Team5!";
    $dbname = "justince_mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_Name = "";
        $user_Password = "";
        if (isset($_POST["user_Name"]) && !empty($_POST["user_Name"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $user_Name =  $_POST["user_Name"];
        }
        if (isset($_POST["user_Password"]) && !empty($_POST["user_Password"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $user_Password =  $_POST["user_Password"];
        }
      
        $sql = "SELECT * FROM tbl_User WHERE user_Name = :uName";

        $statement = $conn->prepare($sql);
        $statement->execute(array(":uName" => $user_Name));
        $count = $statement->rowCount();
        $rows = $statement->fetchAll();
      
        //echo $count . "</br>";
        //echo "user_Name: " . $user_Name . "</br>";

        if ($count > 1) {
          echo "Error: multiple instances of same username in DB.";
        }
                            
        if ($count == 0) {
          echo "username does not exist in DB.";
        }
        
                
        if ($count == 1) {
          if ($user_Password == $rows[0]['user_Password']) {
            header( 'Location: createjoin.html' ) ;
          } else {
            echo "username matches DB.<br>";
            echo "incorrect password";
          }

        }
      
    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
    } else {
      echo "Has to be POST.";
    }

?>


