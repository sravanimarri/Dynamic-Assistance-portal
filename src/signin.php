<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $userpassword = $_POST["password"];


    $sql = "SELECT * FROM signup WHERE email = '$email' AND password = '$userpassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        header("Location: index.html");
        exit;
    } else {
    
        echo "<script>alert('Invalid username or password');</script>";
    }
}
$conn->close();
?>