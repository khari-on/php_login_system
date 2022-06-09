<?php

$invalidErr = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include './partials/_dbconnect.php';
    $password=$_POST['password'];
    $email=$_POST['email'];

    
    
$existSql="SELECT * FROM `client` WHERE email = '$email'";
$result = mysqli_query($conn,$existSql);
$num = mysqli_num_rows($result);

if($num == 1 ){
    
    
    $rows=mysqli_fetch_assoc($result);
    if(password_verify($password,$rows['password'])){
        $username=$rows['username'];
        session_start();
        $_SESSION['logedIn']=true;
        $_SESSION['username']=$username;
    
      header('location:welcome.php');

    }else{
    $invalidErr=true;
        
    };
   
}else{
    $invalidErr=true;
}





}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

     <?php require './partials/_nav.php' ?>
    <?php
     if($invalidErr){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid Credentials!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    
};
?>

   

     <div class="container">

     <h3 class="text-center"> Login In</h3>

     <form  action="./login.php"  method='POST'>
    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>