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
      
        if (isset($_POST["Group_Size"]) && isset($_POST["Group_Budget_Set"])) {
          
          // If the group's budget has a value, check if it's set to true:
          
          if ($_POST["Group_Budget_Set"]) {
            
            // Check if the Group already has an Event set:
            
            if (!empty($_POST["Group_Event_ID"])) {
              
              $sql = "SELECT * FROM tbl_Event WHERE ID = :eventID";
              $statement = $conn->prepare($sql);
              $statement->execute(array(":eventID" => $_POST["Group_Event_ID"]));
              
          } else {
              
              $sql = "SELECT * FROM tbl_Event WHERE Event_PricePP <= :gBudgetPP AND Event_MinUser <= :gSize AND Event_MaxUser >= :gSize";
              $statement = $conn->prepare($sql);
              $statement->execute(array(":gBudgetPP" => $_POST["Group_BudgetPP"], ":gSize" => $_POST["Group_Size"]));
              
            }
            
              $data = $statement->fetchAll();
            
          } else {
            $data["error"] = $_POST["Group_Budget_Set"];
          }
        } else {
              $data["error"] = "yes";
              $data["return"] = "Group not full and/or budget not set.";
        }


    } catch(PDOException $e) {
        $data["error"] = "yes";
        $data["return"] = "" . $sql . $e->getMessage() . $error;
    }
      
    } else {
        // simple error message, only taking GET requests
        $data = array("msg" => "Error: only POST allowed");
    }

    echo json_encode($data, JSON_FORCE_OBJECT);

?>