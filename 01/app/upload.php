<?php
session_start();
if (isset($_SESSION["loggedin"])) {
if ($_SESSION["loggedin"] === "true") {
$target_dir = "uploads/";
$filename = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_FILENAME));
$extension = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
$randomization = rand(10,99);
$target_file = $target_dir . $filename . $randomization . "." . $extension;
$uploadOk = 1;

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk === 0) {
    echo "Sorry, your file was not uploaded.";
	header('refresh:2;url=index.php');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		header('refresh:2;url=index.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
		header('refresh:2;url=index.php');
    }
}
}
}
?>