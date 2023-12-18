<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
echo "yes running";

// var_dump($_GET["name"]);
// if ($_SERVER["REQUEST_METHOD"] == "get") {
//     var_dump($_GET["name"]);
    $name = $_GET["name"];
    $password = $_GET["password"];

// }
$servername = "localhost";
$username = "root";
$password = "";
$database = "newtest";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die("connection failed: ".$conn ->connect_error);
} else{
    $stmt = $conn->prepare("insert into test (name , password) values(? ,?)");
    $stmt ->bind_param("ss", $name, $password );
    $stmt -> execute();
    echo $name;
    echo $password;
    echo "registration successfull";
    $stmt-> close();
    $conn-> close();
}
?>