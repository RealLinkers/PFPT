<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
function connect() {
$servername = $_ENV['MYSQL_HOST'];
$username = $_ENV['MYSQL_USER'];
$password = $_ENV['MYSQL_PASSWORD'];
$database =  $_ENV['MYSQL_DB'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
return $conn;
}

if (isset($_REQUEST["name"]) && isset($_REQUEST["password"])) {
if (isset($_REQUEST["csrf-token"]) && $_REQUEST["csrf-token"] === $_SESSION['token']) {
$c = connect();
$sql = "SELECT uname, upass FROM users WHERE uname = '" . $_REQUEST["name"]. "' LIMIT 1";
$result = $c->query($sql);
$row = mysqli_fetch_assoc($result);
if(isset($row)) {
		if ($row["upass"] === $_REQUEST["password"]) {
			$_SESSION["loggedin"] = "true";
			echo "Succesfuly logged in!";
			header('refresh:2;url=index.php');
		} else {
			echo "Incorrect password!";
			header('refresh:2;url=index.php');
		}
} else {
			echo "This user doesn't even exist!";
			header('refresh:2;url=index.php');
}
$c->close();
} else {
			echo "Invalid CSRF token!";
			header('refresh:2;url=index.php');
}
}
} else {
			echo "Already logged in!";
			header('refresh:2;url=index.php');
}
