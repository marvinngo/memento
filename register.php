<?php

/**
 * Registers a new user.
 */
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$methodType = $_SERVER['REQUEST_METHOD'];

$data = array("msg" => "$methodType");
$data["error"] = "";
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

    $User_Name = "";
    $User_Password = "";
    $User_Email = "";
    if (isset($_POST["User_Name"]) && !empty($_POST["User_Name"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $User_Name =  $_POST["User_Name"];
    }
    if (isset($_POST["User_Password"]) && !empty($_POST["User_Password"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $User_Password =  password_hash($_POST["User_Password"], PASSWORD_DEFAULT);
    }
    if (isset($_POST["User_Email"]) && !empty($_POST["User_Email"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $User_Email =  $_POST["User_Email"];
    }

    if(empty($User_Name) || empty($User_Password) || empty($User_Email)) {
      $data["error"] = "yes";
      $data["return"] = "Empty field(s) - no update performed.";
    } else {

      // Check if username already exists in database:

      $sql = "SELECT * FROM tbl_User WHERE User_Name = :uName";

      $statement = $conn->prepare($sql);
      $statement->execute(array(":uName" => $User_Name));
      $count = $statement->rowCount();

      if ($count > 0) {
        $data["error"] = "yes";
        $data["return"] = "Username already exists in DB.";
      } else {
        // perform update to the DB
        $sql = "INSERT INTO `tbl_User` (User_Name, User_Password, User_Email) values (:UserName, :UserPassword, :UserEmail)";
        // $insert is a 'PDOStatement
        $statement = $conn->prepare($sql);
        $statement->execute(array(":UserName" => $User_Name, ":UserPassword" => $User_Password, ":UserEmail" => $User_Email));

        // Set session login to true to login the user after registering:

        $_SESSION['User_Name'] = $User_Name;
        //$_SESSION['email'] = $User_Email;
        $_SESSION['loggedin'] = true;

        // Send back no error - JS will redirect:

        $data["error"] = "no";
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