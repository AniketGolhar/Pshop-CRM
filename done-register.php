<?php
include 'server.php';

$successful = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $psw_a = $_POST['psw_a'];

  if (empty($name) or empty($email) or empty($psw) or empty($psw_a)) {
    $successful = "All Fields Are Required";
  } elseif ($psw != $psw_a) {
    $successful = "Password Must Be Same";
  } else {
    $sql = "INSERT INTO `done_db` (`name`, `email`, `password`) VALUES ('$name', '$email', '$psw')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      $successful = "Successfully Register";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <!-- bootstrap css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
   <!-- google font family cdn -->
   <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Pacifico&display=swap" rel="stylesheet">
   <!-- internal css -->
   <style>
      *{
  margin:0;
  padding:0;
  box-sizing:border-box;
}
body {
  background: #fbf3ff;
  font-family: 'Comfortaa', cursive;  
}
.container-1 {
  position: absolute;
  max-width: 900px;
  height: 600px;
  margin: auto;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.myleftside {
  position: relative;
  background: #fff;
  border-radius: 25px;
  height: 100%;
  padding: 25px;
  padding-left: 50px;
}
.myleftside h3{
  color: #9b00e8;
  font-family: 'Pacifico', cursive;
}
.myleftside input{
  border-radius: 30px;
  width: 100%;
  padding-left: 40px;
  font-size: 16px;
}
.btn-color{
  background-color: #9b00e8;
  border-radius: 30px;
  color: wheat;
  /* font-family: 'Pacifico', cursive; */
  letter-spacing: 3px;
}
.myleftside .input-icon{
  display: inline-block;
  position: relative;
  width: 100%;
}
.myleftside .fas{
  position: absolute;
  left: 10px;
  top: 46px;
  font-size: 20px;
  color: #9b00e8;
}
.myrightside {
  position: relative;
  background-image: linear-gradient(45deg, #f046ff, #9b00e8);
  border-radius: 25px;
  height: 100%;
  padding: 25px;
  font-size: 12px; 
  display: flex;
  justify-content: center;
  align-items: center;
}
.myrightside h1{
  color: white;
  font-size: 50px;
  text-align: center;
  font-family: 'Pacifico', cursive;
}
.myrightside p{
  font-size: 22px;
  color: white;
}
.myrightside .btn-color-2{
  border-radius: 30px;
  float: right;
  /* font-family: 'Pacifico', cursive; */
  letter-spacing: 3px;
}
.row{
  height: 100%;
}
.mycard {
  position: relative;
  background: #fff;
  height: 100%;
  border-radius: 25px;
  -webkit-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
  -moz-box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
  box-shadow: 0px 10px 40px -10px rgba(0, 0, 0, 0.7);
} 
   </style>
</head>
<body>
    <!-- logo on header -->
   <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="https://www.pngitem.com/pimgs/m/195-1951323_your-logo-here-png-company-logo-your-logo.png" alt="logo" width="200px" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
 <!-- logo on header -->

   <div class="container container-1">
      <div class="mycard">
         <div class="row">
            <div class="col-md-6">
               <div class="myleftside">
                  <h3>Don't Worry Just Sign Up</h3>
                  <br>
                  <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="mb-3 input-icon">
                        <label for="name" class="form-label fs-5 fw-bolder">Full Name</label>
                        <i class="fas fa-id-card"></i>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                     </div>
                     <div class="mb-3 input-icon">
                        <label for="email" class="form-label fs-5 fw-bolder">Email address</label>
                        <i class="fas fa-user"></i>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter User Id">
                     </div>
                     <div class="mb-3 input-icon">
                        <label for="password" class="form-label fs-5 fw-bolder">Password</label>
                        <i class="fas fa-user-lock"></i>
                        <input type="password" class="form-control" id="password" name="psw" placeholder="Enter Password">
                     </div>
                     <div class="mb-3 input-icon">
                        <label for="password-1" class="form-label fs-5 fw-bolder">Password Again</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password-1" name="psw_a" placeholder="Enter Password Again">
                     </div>
                     <div class="d-grid">
                        <button type="submit" class="btn btn-color fs-5 fw-bold">Sign Up</button>
                     </div>
                     <br>
                     <div style="text-align: center;">
                        <h3><?php echo "$successful";?></h3>
                     </div>
                   </form>
               </div>
            </div>
            <div class="col-md-6">
               <div class="myrightside">
                  <div class="mybox">
                     <h1>Wait a Seconds !</h1>
                     <br><br><br>
                        <p>
                           Do you remember that you were logged in, then just simply !
                        </p>
                        <br><br>
                        <a href="done-login.php" class="btn btn-outline-light btn-color-2 fs-4 fw-bolder">Sign In</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- bootstrap script link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>