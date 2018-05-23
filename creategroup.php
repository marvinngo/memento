<?php

      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

$methodType = $_SERVER['REQUEST_METHOD'];

$data = array("msg" => "$methodType");
$data["return"] = "";

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
            $Group_Password =  password_hash($_POST["Group_Password"], PASSWORD_DEFAULT);
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
            $data["error"] = "yes";
            $data["return"] = "No group created - no fields can be left blank.";
        } else {
              
            // perform update to tbl_Group
              
            $sql = "INSERT INTO `tbl_Group` (Group_Name, Group_Description, Group_Password, Group_Size) values (:GroupName, :GroupDescription, :GroupPassword, :GroupSize)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name, ":GroupDescription" => $Group_Description, ":GroupPassword" => $Group_Password, ":GroupSize" => $Group_Size));
            $last_id = $conn->lastInsertId();
            $data["Group_ID"] = $last_id;
            
            // perform update to tbl_Registration
              
            $sql = "INSERT INTO `tbl_Registration` (User_Name, Group_Name, Group_ID) values (:UserName, :GroupName, :GroupID)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":UserName" => $_SESSION['User_Name'], ":GroupName" => $Group_Name,":GroupID" => $last_id));
              
            $data["error"] = "no";

        }

    } catch(PDOException $e) {
        $data["error"] = "yes";
        $data["return"] = "" . $sql . $e->getMessage() . $error;
    }
  
    } else {
      $data["error"] = "yes";
      $data["return"] = "Has to be POST.";
    }

echo json_encode($data, JSON_FORCE_OBJECT);

?>