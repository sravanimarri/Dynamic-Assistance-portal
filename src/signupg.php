<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

// Database connection
$conn=new mysqli('localhost','root','','signup');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} 
else {
    try {
        $stmt=$conn->prepare("insert into signup(name, email, password, confirmpassword) values(?,?,?,?)");
        $stmt->bind_param("ssss",$name,$email,$password,$confirmpassword);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo "Registration successful!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

