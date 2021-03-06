<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['previous'] = array();
$_SESSION['invalid'] = array();
$_SESSION['msg'] = '';

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
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $User_Name = "";
    $User_Password = "";

    if (isset($_POST["User_Name"]) && isset($_POST["User_Password"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $passwordEmpty = false;
      $loginEmpty = false;

      $User_Name =  $_POST["User_Name"];
      $User_Password = $_POST["User_Password"];

    }

    if (empty($_POST["User_Name"])) {
      $loginEmpty = true;
      $_SESSION['invalid']['login'] = true;
      $_SESSION['previous']['password'] = $_POST['password'];
    }

    if (empty($_POST["User_Password"])) {

      $passwordEmpty = true;
      $_SESSION['invalid']['password'] = true;
      $_SESSION['previous']['login'] = $_POST['login'];

    }

    if (!$loginEmpty && !$passwordEmpty) {

      $_SESSION['previous']['login'] = $_POST["User_Password"];

      $sql = "SELECT * FROM tbl_User WHERE User_Name = :uName";

      $statement = $conn->prepare($sql);
      $statement->execute(array(":uName" => $User_Name));
      $count = $statement->rowCount();
      $rows = $statement->fetchAll();

      if ($count > 1) {
        $data["error"] = "yes";
        $data["return"] = "Multiple instances of same Username in DB.";
      }

      if ($count == 0) {
        $data["error"] = "yes";
        $data["return"] = "Username does not exist in DB.";
      }


      if ($count == 1) {
        if (password_verify($User_Password, $rows[0]['User_Password'])) {

          $_SESSION['User_Name'] = $User_Name;
          $_SESSION['email'] = $rows[0]['User_Email'];
          $_SESSION['loggedin'] = true;

          $data["error"] = "no";

          //header( 'Location: createjoin.php' ) ;
        } else {
          $data["error"] = "yes";
          $data["return"] = "Username matches DB. Incorrect password.";
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


