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
            $data["error"] = "yes";
            $data["return"] = "No group joined - group name and/or group password cannot be empty.";
          
        } else {
          
            // Check if Group Name exists in database:
          
            $sql = "SELECT * FROM tbl_Group WHERE Group_Name = :GroupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name));
            $count = $statement->rowCount();
            $rows = $statement->fetchAll();
          
            if ($count == 0) {
              $data["error"] = "yes";
              $data["return"] = "Group Name does not exist.";
            } else {
              
            // Check if Password matches in database:
              
          if ($count == 1) {
          if (password_verify($Group_Password, $rows[0]['Group_Password'])) {
            
            // Check if group is full:
            
            $Group_Size = $rows[0]['Group_Size'];
            
            $sql = "SELECT * FROM tbl_Registration WHERE Group_Name = :GroupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":GroupName" => $Group_Name));
            $regCount = $statement->rowCount();
            $groupReg = $statement->fetchAll();
            
            // Check if user has already joined group:
            $userExists = false;
            
            foreach ($groupReg as $row) {
              if ($row["User_Name"] == $_SESSION['User_Name']) {
                $userExists = true;
              }
            }

            if ($regCount >= $Group_Size) {
              $data["error"] = "yes";
              $data["return"] = "Group is already full.";
            } else if ($userExists) {
              $data["error"] = "yes";
              $data["return"] = "You have already joined this group.";            
            } else {
            
            // Add username to Registration:
            
            $sql = "INSERT INTO `tbl_Registration` (User_Name, Group_Name) values (:UserName, :GroupName)";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute(array(":UserName" => $_SESSION['User_Name'], ":GroupName" => $Group_Name));
            
            $data["error"] = "no";
              
            $data["Group_Description"] = $rows[0]['Group_Description'];
              
              }
          } else {
            $data["error"] = "yes";
            $data["return"] = "Group name matches database but password is incorrect.";
            $data["password"] = $Group_Password;
            $data["passhash"] = password_hash($_POST["Group_Password"], PASSWORD_DEFAULT);
          }
          }
          }
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