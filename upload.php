

<?php

// This document allows users to upload images to the website.

// saves img to this directory
$target_dir = "img/mygroups/";

// path of uploaded file
// eg uploaded-imgs/ele2.gif
$target_file = $target_dir . basename($_FILES["grouppic"]["name"]);

//variable to check validity of uploaded img
//will be set to 0 if invalid file
$uploadOk = 1;

//holds extension of file
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["grouppic"]["tmp_name"]);
	if($check !== false) {
 		$uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// check file size
//in bytes. 1,000,000 = 1 mb
if ($_FILES["grouppic"]["size"] > 10000000) {
	echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// only allow jpg, jpeg, png, gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// check if $uploadOk was set to zero
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
	// if not, upload the file
} else {
  if (move_uploaded_file($_FILES["grouppic"]["tmp_name"], $target_file)) {
    echo basename( $_FILES["grouppic"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// This portion of PHP saves the image name and location so that it can be displayed later.
$servername = "localhost";
$dblogin = "evanmorr_team5";
$password = "Team5!Team5!";
$dbname = "evanmorr_mementodb";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$Group_ID = $_POST['Group_ID'];

$sql = "UPDATE tbl_Group SET Group_ImgLoc = :TFile WHERE ID = :groupID";

$statement = $conn->prepare($sql);
$statement->execute(array(":TFile" => $target_file, ":groupID" => $Group_ID));

// Refreshes the page
header("Location: createjoin.php");

?>