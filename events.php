<?php

$methodType = $_SERVER['REQUEST_METHOD'];

if ($methodType === 'POST') {

    $servername = "localhost";
    $dblogin = "justince_team5";
    $password = "Team5!Team5!";
    $dbname = "justince_mementodb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $Group_Name =  $_POST["Group_Name"];

        $sql = "SELECT * FROM tbl_Registration WHERE Group_Name = :GroupName";

        $statement = $conn->prepare($sql);
        $statement->execute(array(":GroupName" => $Group_Name));
        $count = $statement->rowCount();
        $rows = $statement->fetchAll();
      
        //echo $count . "</br>";
        //echo "User_Name: " . $User_Name . "</br>";
                            
        if ($count == 0) {
          echo "No users in group.";
        }
      
        $sum = 0;
                
        if ($count > 0) {
            foreach ($rows as $row) {
            echo $row['User_Name'] . ": " . $row['Reg_Budget'];
            $sum += $row['Reg_Budget'];
          } 
          echo "Total budget: " . $sum;

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


