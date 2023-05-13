<?php
// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pofo = $_POST['pofo'];
  $resumeurl = $_POST['resumeurl'];
  $coverletter = $_POST['coverletter'];
  // Connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'jobapp');

  // Insert form data into database
  $query = "INSERT INTO form_data (name, email, pofo, resumeurl, coverletter) VALUES ('$name', '$email', '$pofo', '$resumeurl', '$coverletter)";
  mysqli_query($conn, $query);

  // Send email
  ini_set('SMTP', ' smtp.gmail.com');
  ini_set('smtp_port', 465);
  $to = $email;
  $subject = 'Thank you for your message';
  $message = "Dear $name,\n\nThank you for your message. We will get back to you soon.\n\nBest regards,\nYour company";
  $headers = 'From: your_email@example.com' . "\r\n" .
             'Reply-To: your_email@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();
  mail($to, $subject, $message, $headers);

  // Close database connection
  mysqli_close($conn);

  
}
?>