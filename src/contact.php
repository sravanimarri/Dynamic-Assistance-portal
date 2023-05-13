<?php
    $name=$_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

   // Database connection
  $conn = new mysqli('localhost','root','','contact');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } 
  else {
    $stmt = $conn->prepare("insert into contact( name, email, number, message) values( ?, ?, ?, ?)");
    $stmt->bind_param("ssss",$name, $email, $number, $message);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
  }
?>