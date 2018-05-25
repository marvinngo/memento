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

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $_POST["Registration_Budget"] = floatval($_POST["Registration_Budget"]);

    //foreach ($_POST as $key => $value){
       //simply parrot back what was sent
    //  $data[$key] = $value;
    //}
    // for testing:
    // echo json_encode($data, JSON_FORCE_OBJECT);

    // Make sure the value sent to the server is set, isn't empty, and is numeric:

    $User_Name = "";
    $Group_Name = "";
    $Registration_Budget = "";

    // Convert JSON stringified float from String to float:  
    //$Registration_Budget = floatval($_POST["Registration_Budget"]);

    if (isset($_POST["Registration_Budget"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $Registration_Budget =  $_POST["Registration_Budget"];
      $User_Name =  $_POST["User_Name"];
      $Group_Name =  $_POST["Group_Name"];
    }

    // Changed from empty() to is_numeric() to deal with empty(0) returning true and because I can't check if is empty OR equals zero because the floatval won't exactly equal zero, so floatval('0') === 0 is false

    // Apparently floatval('0') >= 0 returns true.

    if (!empty($User_Name) && !empty($Group_Name) && is_numeric($Registration_Budget) && ($Registration_Budget >= 0)) {

      // Insert value into database:

      $sql = "UPDATE tbl_Registration SET Registration_Budget = :rBudget WHERE User_Name = :uName && Group_Name = :groupName";

      $statement = $conn->prepare($sql);
      $statement->execute(array(":rBudget" => $Registration_Budget, ":uName" => $User_Name, ":groupName" => $Group_Name));
      //$groupcount = $statement->rowCount();
      //$data = $statement->fetchAll();

      // Find all registration entries in database that match the group name and return them to the Ajax call for processing:

      $sql = "SELECT * FROM tbl_Registration WHERE Group_Name = :groupName";
      $statement = $conn->prepare($sql);
      $statement->execute(array(":groupName" => $Group_Name));
      $data = $statement->fetchAll();
      //echo json_encode($data, JSON_FORCE_OBJECT);

    }

  } catch(PDOException $e) {
      $data["error"] = "yes";
      $data["return"] = "" . $sql . $e->getMessage() . $error;
  }

} else {
    // simple error message, only taking GET requests
    $data = array("msg" => "Error: only GET allowed");
}

echo json_encode($data, JSON_FORCE_OBJECT);

?>