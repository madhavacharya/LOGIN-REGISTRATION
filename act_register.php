<!-- <?php require 'db_connection.php'; 
  session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function phpMailSend($email, $token_check){
  require 'mail/Exception.php';
  require 'mail/PHPMailer.php';
  require 'mail/SMTP.php';
  
    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = 0;                     
      $mail->isSMTP();                                           
      $mail->Host       = 'smtp.gmail.com';                    
      $mail->SMTPAuth   = true;                                  
      $mail->Username   = 'madhavacharya04@gmail.com';                    
      $mail->Password   = 'ofhfrllxkrvovmel';                               
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
      $mail->Port       = 465;  
      $mail->setFrom('madhavacharya04@gmail.com', 'Madhav');
      $mail->addAddress($email);
      $mail->isHTML(true);                                 
      $mail->Subject = 'Verify Email';
      $mail->Body    = "<a href='http://localhost/User_REGISTER/emailverification.php?email=$email&token_check=$token_check'> Link VERIFY!</a>";
      $mail->send();  
      return true;                          
  }
  catch (Exception $e) {
    return false;
}
}?> -->

<?php
if(isset($_POST['submit'])){
  $first_name = $_POST['fname'];
  $last_name = $_POST['lname'];  
  $email = $_POST['email'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $password =  ($_POST['pwd']);
  $confirmpassword =  ($_POST['cpwd']);

  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
  $hashed_password = password_hash($confirmpassword, PASSWORD_BCRYPT);
  $token_check=bin2hex(random_bytes(14));
  //inserting query
  $insert_data = "INSERT INTO register_user (first_name, last_name, email, address, dob, phone_no, gender, password,token,token_ok ) 
                  VALUES ('$first_name', '$last_name', '$email', '$address', '$dob', '$phone', '$gender', '$password','$token_check','0')";
  
  if(mysqli_query($con, $insert_data) && phpMailSend($email, $token_check)){
    echo "<script> alert('Registered successfully!'); 
          window.location.href = 'login.php'; </script>";


   
    exit();
  } else {
    echo 'Failed to insert data';
  }

//   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];
//     if ($password === $confirm_password) {
//         // passwords match
//     } else {
//         // passwords don't match
//     }
// }
}
?>

