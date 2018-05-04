<?php

    $servername = "localhost";
    $dblogin = "justince_team5";
    $password = "Team5!Team5!";
    $dbname = "justince_mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$User_Name = "";
        $User_Password = "";
        $User_Email = "";
        if (isset($_POST["User_Name"]) && !empty($_POST["User_Name"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $User_Name =  $_POST["User_Name"];
        }
        if (isset($_POST["User_Password"]) && !empty($_POST["User_Password"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $User_Password =  $_POST["User_Password"];
        }
        if (isset($_POST["User_Email"]) && !empty($_POST["User_Email"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $User_Email =  $_POST["User_Email"];
        }

        if(empty($User_Name) || empty($User_Password) || empty($User_Email)) {
            echo "<p>No update performed.</p>";
        } else {
            // perform update to the DB
            $sql = "INSERT INTO `tbl_User` (User_Name, User_Password, User_Email) values (:UserName, :UserPassword, :UserEmail)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":UserName" => $User_Name, ":UserPassword" => $User_Password, ":UserEmail" => $User_Email));
            header( 'Location: createjoin.html' ) ;
        }

    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }

?>