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

    $User_Name = $_POST["User_Name"];

    $sql = "SELECT * FROM `tbl_Registration` WHERE User_Name = :UserName";

    $statement = $conn->prepare($sql);
    $statement->execute(array(":UserName" => $User_Name));
    $data = $statement->fetchAll();

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
