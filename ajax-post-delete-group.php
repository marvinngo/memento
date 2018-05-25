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

    $Group_ID = $_POST["Group_ID"];

    $sql = "DELETE FROM `tbl_Registration` WHERE Group_ID = :groupID";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":groupID" => $Group_ID));

    $sql = "DELETE FROM `tbl_Group` WHERE ID = :groupID";
    $statement = $conn->prepare($sql);
    $statement->execute(array(":groupID" => $Group_ID));

    $data["error"] = "no";

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
