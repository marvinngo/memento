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

      // Check if username already exists in database in javascript - grab all registrations:

      $sql = "SELECT * FROM tbl_Registration";

      $statement = $conn->prepare($sql);
      $statement->execute(array());
      $data = $statement->fetchAll();

      //echo json_encode($data);
      //var_dump($rows[0]["Event_Description"]);

    } catch(PDOException $e) {
        echo "<p style='color: red;'>From the SQL code: $sql</p>";
        $error = $e->getMessage();
        echo "<p style='color: red;'>$error</p>";
  }

} else {
      // simple error message, only accept GET requests
      $data = array("msg" => "Error: only POST allowed");
}

echo json_encode($data, JSON_FORCE_OBJECT);

?>