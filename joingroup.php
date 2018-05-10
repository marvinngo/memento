<?php

  if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

$methodType = $_SERVER['REQUEST_METHOD'];

if ($methodType === 'POST') {

    $servername = "localhost";
    $dblogin = "evanmorr_team5";
    $password = "Team5!Team5!";
    $dbname = "evanmorr_mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    $Group_Name = "";
        $Group_Password = "";
      
        if (isset($_POST["Group_Name"]) && !empty($_POST["Group_Name"])) {
            // Checks if Group_Name is set (not null) and not empty
            // If both are true, sets $Group_Name to whatever is in $_POST 
            // that was sent from a form when a user clicked Submit
            $Group_Name =  $_POST["Group_Name"];
        }
        if (isset($_POST["Group_Password"]) && !empty($_POST["Group_Password"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Group_Password =  $_POST["Group_Password"];
        }

        if(empty($Group_Name) || empty($Group_Password)) {
            echo "<p>No update performed.</p>";
          
        } else {
          
            // Check if Group Name exists in database:
          
            $sql = "SELECT * FROM tbl_Group WHERE Group_Name = :GroupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name));
            $count = $statement->rowCount();
            $rows = $statement->fetchAll();
          
            if ($count == 0) {
              echo "Group Name does not exist in DB.";
            } else {
              
            // Check if Password matches in database:
              
          if ($count == 1) {
          if (hash_equals($rows[0]['Group_Password'], crypt($Group_Password, $rows[0]['Group_Password']))) {
            // Placeholder - should go to specific group's page? Depends
            // how MyGroups page is implemented.
            
            // Add username to Registration:
            
            $sql = "INSERT INTO `tbl_Registration` (User_Name, Group_Name) values (:UserName, :GroupName)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":UserName" => $_SESSION['User_Name'], ":GroupName" => $Group_Name));
            
            header( 'Location: createjoin.php' ) ;
          } else {
            echo "Username matches DB.<br>";
            echo "incorrect password";
          }
          }
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