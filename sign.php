<?php
$showAlert = false;
$showError = false; 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'partials/_dbconnect.php';
  $username = $_POST["Username"];
  $Password = $_POST["Password"];
  $Confirm_Password = $_POST["Confirm_Password"];
  $exist=false;
  if(($Password == $Confirm_Password) && $exist == false){
    $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$Password', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
    }
 
  }else{
    $showError = "Password is wrong";
  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Signup</title>
</head>
  <body>
   
   <?php require 'partials/_nav.php'?>

   <?php 
   if($showAlert){
   echo'<div class="alert alert-success" role="alert">
  Alert! <a href="#" class="alert-link">You have Successfully Signup.</a>
</div> ';
}
if($showError){
  echo'<div class="alert alert-danger" role="alert">
 Alert! <a href="#" class="alert-link">Wrong Password</a>
</div> ';
}
?> 


   <div class="container" >
    <h1 class="text-center">Signup here</h1>
    <form action="/table/sign.php" method="post">

  <div class="form group col-md-6">
    <label for="Username" class="form-label">Username</label>
    <input type="text" class="form-control" id="Username"  name = "Username">
   
  </div>
  <div class="form group col-md-6">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
    
  </div>
  <div class="form group col-md-6">
    <label for="Confirm_Password" class="form-label">Confirm_Password</label>
    <input type="Confirm_Password" class="form-control" id="Confirm_Password" name="Confirm_Password">
    <div id="Confirm_Password" class="form-text">Make sure to put Correct Password</div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary form group col-md-6">Singup</button> <br></br>

  <button type="submit" class="btn btn-primary  form group col-md-6">Reset</button><br></br>

  <button type="submit" class="btn btn-primary  form group col-md-6">Back</button><br></br>

   </form>
   </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>