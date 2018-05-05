<?php

    $servername = "localhost";
    $dblogin = "justince_team5";
    $password = "Team5!Team5!";
    $dbname = "justince_mementodb";

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
            $Group_Password =  $_POST["Group_Password"];
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
              
            // perform update to the DB
              
            $sql = "INSERT INTO `tbl_Group` (Group_Name, Group_Description, Group_Password, Group_Size) values (:GroupName, :GroupDescription, :GroupPassword, :GroupSize)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name, ":GroupPassword" => $Group_Password, ":GroupDescription" => $Group_Description, ":GroupSize" => $Group_Size));
            header( 'Location: mygroups.html' ) ;
            }
        }

    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }

?>