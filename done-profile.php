<?php
session_start();
include "server.php";
// include "done-login.php";

$sql = "SELECT * FROM done_db WHERE id=$_SESSION[id]" ; 

$run = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($run);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <style>
        table{
            width: 100%;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
    <!--main box for profile display start-->
    <div class="main-profile-box" style="float: right; width: 75%;">
        <div class="container pt-4">
            <h1><label for="" class="form-label fw-bolder"><?php echo $row['name'];?></label> <a href="done-logout.php" class="btn btn-primary" style="float: right;">Log Out</a></h1>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="text-primary">Basic Information</h3>
                    <img src="<?php echo $row['photo'];?>" class="img-thumbnail" alt="profile photo" width="200px">
                    <br> <br>
                    <a href="done-profile-update.php" class="btn btn-primary">Update Profile</a>
                </div>
                <div class="col-sm-9">
                    <br>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Full Name</label></div>
                        <div class="col"><?php echo $row['name'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Email Id</label></div>
                        <div class="col"><?php echo $row['email'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Gender</label></div>
                        <div class="col"><?php echo $row['gender'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Date of Birth</label></div>
                        <div class="col"><?php echo $row['dob'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Marital Status</label></div>
                        <div class="col"><?php echo $row['marital'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">Domicile</label></div>
                        <div class="col"><?php echo $row['domicile'];?></div>
                    </div>
                    <div class="row">
                        <div class="col"><label for="" class="form-label">City</label></div>
                        <div class="col"><?php echo $row['city'];?></div>
                    </div>
                    <br>
                    <hr>
                </div>
            </div><!--row complete 1st-->
            <div class="row">
                <h1>Brief About <label for="" class="form-label"><?php echo $row['name'];?></label></h1>
                <h5>My Brief Description About My Profile</h5><hr>
                <h3 class="text-primary">Other Information</h3>
                <div class="col-sm-10">
                        <div class="row">
                            <div class="col"><label for="" class="form-label">Mobile Number</label></div>
                            <div class="col"><?php echo $row['mobile'];?></div>
                        </div>
                        <div class="row">
                            <div class="col"><label for="" class="form-label">Telephone Number</label></div>
                            <div class="col">enter the details</div>
                        </div>
                        <div class="row">
                            <div class="col"><label for="" class="form-label">FB Id</label></div>
                            <div class="col">enter the details</div>
                        </div>
                        <div class="row">
                            <div class="col"><label for="" class="form-label">Instagram Id</label></div>
                            <div class="col">enter the details</div>
                        </div>
                        <div class="row">
                            <div class="col"><label for="" class="form-label">Sykpe Id</label></div>
                            <div class="col">enter the details</div>
                        </div>
                    <br>
                </div>
                <hr>
            </div><!--row complete 2nd-->
        </div><!--container complete of main profile box-->
    </div>
    <!--main box for profile display end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>