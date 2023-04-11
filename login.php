<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<body data-bs-theme="dark">
    <div class="container">
        <div class="d-flex justify-content-center mt-4" >
            <div class="col-5 p-3 shadow-lg">
                <h2 class="text-center text_muted"> Login Form</h2>
                <form action="login.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" require>
                    <div class="my-2">
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" required>
                    </div>

                    <p>Don't have an account? <a href="register_form.php">Sign up here</a></p>
                    <div class="my-2">
                        <input type="submit" value="Login" class="btn btn-primary" required>
                    </div>
            </div>
      </div>
    </div>
</body>
</html>


<?php require 'db_connection.php' ?>

<?php
//start the session
// session_start();
//chech if login form is submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
 $email=$_POST['email'];
 $password=$_POST['pwd'];
//  $confirmpassword=$_POST['cpwd'];
 


 //retrive user data by email
 $select="select* from register_user where email='$email'";
 $show=mysqli_query($con,$select);
 $count=mysqli_num_rows($show);
 if($count<1){
    echo'<div style="text-align:center;">sorry the email you provided not found in system</div>';
 }
 else{
 $user=mysqli_fetch_assoc($show);

 //check for password match
 if($password===$user['password']){
    $_SESSION['email']=$user['email'];
    // $_SESSION['confirmpassword']=$user['confirmpassword'];
    header('Location:dashboard.php');
 }
 else{
    echo'<div style="text-align:center;">email or password does not match</div>';
   
 }
}
}
 ?>