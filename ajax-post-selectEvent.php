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
      
        //foreach ($_POST as $key => $value){
           //simply parrot back what was sent
        //  $data[$key] = $value;
        //}
        // for testing:
        // echo json_encode($data, JSON_FORCE_OBJECT);
      
        //JSON sent: eventInfo = {"Group_Name":Group_Name,"Event_ID":Event_ID};
      
        $Event_ID = "";
        $Group_Name = "";
      
        // Convert JSON stringified float from String to float:  
        //$Registration_Budget = floatval($_POST["Registration_Budget"]);
        
          if (isset($_POST["Event_ID"]) && isset($_POST["Group_Name"])) {
            
            $Event_ID =  $_POST["Event_ID"];
            $Group_Name =  $_POST["Group_Name"];
        }
      
            // Insert value into database:
            
            $sql = "UPDATE tbl_Group SET Event_Name = :eventID WHERE Group_Name = :groupName";

            $statement = $conn->prepare($sql);
            $statement->execute(array(":eventID" => $Event_ID, ":groupName" => $Group_Name));
            //$count = $statement->rowCount();
            //$data = $statement->fetchAll();
            //echo json_encode($data, JSON_FORCE_OBJECT);

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