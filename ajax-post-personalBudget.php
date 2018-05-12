<?php

    $methodType = $_SERVER['REQUEST_METHOD'];
    $data = array("msg" => "$methodType");
    
    if ($methodType === 'POST') {

    $servername = "localhost";
    $dblogin = "evanmorr_team5";
    $password = "Team5!Team5!";
    $dbname = "evanmorr_mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $_POST["Registration_Budget"] = floatval($_POST["Registration_Budget"]);
      
        foreach ($_POST as $key => $value){
           //simply parrot back what was sent
          $data[$key] = $value;
        }
        // for testing:
        // echo json_encode($data, JSON_FORCE_OBJECT);

        // Make sure the value sent to the server is set, isn't empty, and is numeric:
      
        $User_Name = "";
        $Group_Name = "";
        $Registration_Budget = "";
      
        // Convert JSON stringified float from String to float:  
        //$Registration_Budget = floatval($_POST["Registration_Budget"]);
        
          if (isset($_POST["Registration_Budget"]) && !empty($_POST["Registration_Budget"])) {
            // these names don't all have to be the same but if we have several variables
            // then it makes sense to make them the same
            $Registration_Budget =  floatval($_POST["Registration_Budget"]);
            $User_Name =  $_POST["User_Name"];
            $Group_Name =  $_POST["Group_Name"];
        }
          if (!empty($User_Name) && !empty($Group_Name) && empty(!$Registration_Budget)) {
            
            // Insert value into database:
            
            $sql = "UPDATE tbl_Registration SET Registration_Budget = :rBudget WHERE User_Name = :uName && Group_Name = :groupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":rBudget" => $Registration_Budget, ":uName" => $User_Name, ":groupName" => $Group_Name));
            //$groupcount = $statement->rowCount();
            //$data = $statement->fetchAll();
            
            $sql = "SELECT * FROM tbl_Registration WHERE User_Name = :uName && Group_Name = :groupName";
            $statement = $conn->prepare($sql);
            $statement->execute(array(":uName" => $User_Name, ":groupName" => $Group_Name));
            $data = $statement->fetchAll();
            echo json_encode($data, JSON_FORCE_OBJECT);
            
          }

    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
    }
      
    } else {
        // simple error message, only taking GET requests
        $data = array("msg" => "Error: only GET allowed");
    }

    //echo json_encode($data, JSON_FORCE_OBJECT);

?>