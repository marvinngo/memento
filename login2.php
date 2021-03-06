<?php

$methodType = $_SERVER['REQUEST_METHOD'];

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
    if (isset($_POST["User_Name"]) && !empty($_POST["User_Name"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $User_Name =  $_POST["User_Name"];
    }
    if (isset($_POST["User_Password"]) && !empty($_POST["User_Password"])) {
      // these names don't all have to be the same but if we have several variables
      // then it makes sense to make them the same
      $User_Password = $_POST["User_Password"];
    }

    $sql = "SELECT * FROM tbl_User WHERE User_Name = :uName";

    $statement = $conn->prepare($sql);
    $statement->execute(array(":uName" => $User_Name));
    $count = $statement->rowCount();
    $rows = $statement->fetchAll();

    //echo $count . "</br>";
    //echo "User_Name: " . $User_Name . "</br>";

    if ($count > 1) {
      echo "Error: multiple instances of same Username in DB.";
    }

    if ($count == 0) {
      echo "Username does not exist in DB.";
    }


    if ($count == 1) {
      if (hash_equals($rows[0]['User_Password'], crypt($User_Password, $rows[0]['User_Password']))) {
        $User_NameJSON = json_encode($User_Name);
        echo $User_NameJSON;
        //header( 'Location: createjoin.html' ) ;
      } else {
        echo "Username matches DB.<br>";
        echo "incorrect password";
      }

    }

  } catch(PDOException $e) {
    echo "<p style='color: red;'>From the SQL code: $sql</p>";
    $error = $e->getMessage();
    echo "<p style='color: red;'>$error</p>";
  }
} else {
  echo "Has to be POST.";
}

?>


