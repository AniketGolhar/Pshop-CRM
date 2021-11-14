<?php
session_start();
include 'server.php';
//include 'function.php';
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {

   $email = $_POST['email'];
   $password = $_POST['password'];

   if (!empty($email) && !empty($password) && !is_numeric($email)) {
      // echo $password;
      $query = "SELECT * FROM done_db WHERE email = '$email' limit 1";
          
      $result = mysqli_query($conn,$query);

      if ($result){

         if ($result && mysqli_num_rows($result) > 0) {
               
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                  
                  $_SESSION['id'] = $user_data['id'];
                  $_SESSION['name'] = $user_data['name']; 
                  header("Location: done-profile.php");
            }else {
                     $error = "Password Is Wrong";
            }
         }else {
            $error = "User ID not Verified";
         }
      }
   }else {
      $error = "All Field is Required";
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
.myleftside h2{
  color: #9b00e8;
  font-family: 'Pacifico', cursive;
}
.myleftside h4{
  color: #f046ff;
  /* font-family: 'Pacifico', cursive; */
}
.myleftside input{
  border-radius: 30px;
  width: 100%;
  padding-left: 35px;
  font-size: 20px;
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
  top: 55px;
  font-size: 20px;
  color: #9b00e8;
}
.myleftside .forgot{
   text-decoration: none;
   color: black;
}
.myleftside .forgot:hover{
   color: red;
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
                  <h2>Discover Everything</h2>
                  <br>
                  <h4><?php echo $error;?></h4>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                     <div class="mb-3 input-icon">
                        <label for="email" class="form-label fs-4 fw-bolder">Email address</label>
                        <i class="fas fa-user"></i>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter User Id">
                     </div>
                     <div class="mb-3 input-icon">
                        <label for="password" class="form-label fs-4 fw-bolder">Password</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                     </div>
                     <div class="d-grid">
                        <button type="submit" class="btn btn-color fs-4 fw-bold">Sign In</button>
                     </div>
                     <br>
                     <div class="gap-2 d-md-block text-center">
                        <a href="" class="btn btn-light"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/facebook-512.png" alt="facebook" width="40px" height="40px" style="border-radius: 50%;"></a>
                        <a href="" class="btn btn-light"><img src="https://e7.pngegg.com/pngimages/63/1016/png-clipart-google-logo-google-logo-g-suite-chrome-text-logo.png" alt="google" width="40px" height="40px" style="border-radius: 50%;"></a>
                        <a href="" class="btn btn-light"><img src="https://toppng.com/uploads/preview/circle-twitter-logo-png-11536001225vm30ml2dw2.png" alt="twitter" width="40px" height="40px" style="border-radius: 50%;"></a>
                        <a href="" class="btn btn-light"><img src="https://image.similarpng.com/very-thumbnail/2021/01/Illustration-of-Linkedin-icon-on-transparent-background-PNG.png" alt="linkedin" width="40px" height="40px" style="border-radius: 50%;"></a>
                      </div>
                      <!-- <a href="" class="float-end m-2 fs-5 forgot">forgot password..?</a><br> -->
                      <!-- Button trigger modal -->
                     <button type="button" class="btn float-end m-2 fs-5 forgot" data-bs-toggle="modal" data-bs-target="#forgot">
                        forgot password..?
                     </button>
                   </form>
               </div>
            </div>
            <div class="col-md-6">
               <div class="myrightside">
                  <div class="mybox">
                     <h1>New Here ?</h1>
                     <br><br><br>
                        <p>
                           Sign up and discover great amount of new opportunities !
                        </p>
                        <br><br>
                        <a href="done-register.php" class="btn btn-outline-light btn-color-2 fs-4 fw-bolder">Sign Up</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
 
 <!-- Modal -->
 <div class="modal fade" id="forgot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <!-- <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div> -->

       <div class="modal-body">
         <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
         <form action="">
            <div class="mb-3">
               <label for="name-1" class="form-label fs-4 fw-bolder">Full Name</label>
               <input type="text" class="form-control" id="name-1" name="nameForgot" placeholder="Enter Full Name">
            </div>
            <div class="mb-3">
               <label for="email-1" class="form-label fs-4 fw-bolder">Email Address</label>
               <input type="email" class="form-control" id="email-1" name="emailForgot" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-primary float-end">Submit</button>
         </form>
      </div>
       <!-- <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary">Save changes</button>
       </div> -->
     </div>
   </div>
 </div>

   <!-- bootstrap script link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>