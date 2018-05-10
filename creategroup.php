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
        $Group_Description = "";
        $Group_Size = "";
        if (isset($_POST["Group_Name"]) && !empty($_POST["Group_Name"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Group_Name =  $_POST["Group_Name"];
        }
        if (isset($_POST["Group_Password"]) && !empty($_POST["Group_Password"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Group_Password =  crypt($_POST["Group_Password"]);
        }
        if (isset($_POST["Group_Description"]) && !empty($_POST["Group_Description"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Group_Description =  $_POST["Group_Description"];
        }
        if (isset($_POST["Group_Size"]) && !empty($_POST["Group_Size"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Group_Size =  $_POST["Group_Size"];
        }

        if(empty($Group_Name) || empty($Group_Password) || empty($Group_Description) || empty($Group_Size)) {
            echo "<p>No update performed.</p>";
        } else {
          
            // Check if username already exists in database:
          
            $sql = "SELECT * FROM tbl_Group WHERE Group_Name = :GroupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name));
            $count = $statement->rowCount();
          
            if ($count > 0) {
              echo "Group Name already exists in DB.";
            } else {
              
            // perform update to tbl_Group
              
            $sql = "INSERT INTO `tbl_Group` (Group_Name, Group_Description, Group_Password, Group_Size) values (:GroupName, :GroupDescription, :GroupPassword, :GroupSize)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name, ":GroupPassword" => $Group_Password, ":GroupDescription" => $Group_Description, ":GroupSize" => $Group_Size));
            
            // perform update to tbl_Registration
              
            $sql = "INSERT INTO `tbl_Registration` (User_Name, Group_Name) values (:UserName, :GroupName)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":UserName" => $_SESSION['User_Name'], ":GroupName" => $Group_Name));
              
              
            
            header( 'Location: createjoin.php' ) ;
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