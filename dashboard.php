<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 


<?php require ('db_connection.php'); 
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
?>

<?php
// session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $select="select * from register_user where email='$email'";
    $show=mysqli_query($con,$select);
    $user=mysqli_fetch_assoc($show);
    ?>
    <h1>
        <p>welcome to this page</p>
    </h1>
    <h1>
        <?php echo $user['first_name']; ?>
    </h1>
    <h1>
        <?php echo $user['last_name']; ?>
    </h1
    <?php
}
else{
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="logout.php" class="btn btn-danger px-3 rounded-pill">Logout</a>
</body>
</html>

