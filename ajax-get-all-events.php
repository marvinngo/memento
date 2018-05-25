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
    
    // Retrieve all Events from events table:

    $sql = "SELECT * FROM tbl_Event";
    $statement = $conn->prepare($sql);
    $statement->execute(array());
    $data = $statement->fetchAll();

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