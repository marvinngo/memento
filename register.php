<?php

    $servername = "localhost";
    $dblogin = "root";
    $password = "";
    $dbname = "mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$user_Name = "";
        $user_Password = "";
        $user_Email = "";
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
        if (isset($_POST["user_Email"]) && !empty($_POST["user_Email"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $user_Email =  $_POST["user_Email"];
        }

        if(empty($user_Name) || empty($user_Password) || empty($user_Email)) {
            echo "<p>No update performed.</p>";
        } else {
            // perform update to the DB
            $sql = "INSERT INTO `tbl_user` (user_Name, user_Password, user_Email) values (:userName, :userPassword, :userEmail)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":userName" => $user_Name, ":userPassword" => $user_Password, ":userEmail" => $user_Email));
            header( 'Location: createjoin.html' ) ;
        }

    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }

?>