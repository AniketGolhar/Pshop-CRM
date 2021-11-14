<?php
session_start();
include "server.php";

$sql = "SELECT * FROM done_db WHERE id=$_SESSION[id]" ; 

$run = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($run);


if (isset($_POST['submit'])) {
    
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $marital = $_POST['marital'];
    $domicile = $_POST['domicile'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];

    $photo = $_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['tmp_name'];
    $name1 = uniqid('reg', true);
    $photo_name= $name1.$photo;
    $photo1 = "image/".$name1.$photo;
    move_uploaded_file($temp_name, $photo1);

    if (empty($gender) or empty($dob) or empty($marital) or empty($domicile) or empty($city) or empty($mobile) or empty($photo)) {
        echo "All Fields are Required";
    } else {
        $sql_1 = "UPDATE done_db
        SET gender='$gender',dob='$dob', marital='$marital', domicile='$domicile', city='$city', mobile='$mobile', photo='$photo1'
        WHERE id=$_SESSION[id] " ;
    
        $run = mysqli_query($conn, $sql_1);

        if ($run) {
            echo "Successfully Update";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1><label for="" class="form-label fw-bolder"><?php echo $row['name'];?></label> <a href="done-profile.php" class="btn btn-primary" style="float: right;">Profile</a></h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="" class="form-label fs-4 fw-bolder">Gender:</label>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <input type="radio" id="male" name="gender" value="Male">
                        <label for="male" class="form-label fs-4 fw-bolder">Male</label>
                        </div>
                        <div class="col">
                            <input type="radio" id="female" name="gender" value="Female">
                        <label for="female" class="form-label fs-4 fw-bolder">Female</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="dob" class="form-label fs-4 fw-bolder">Date of Birth:</label>
                </div>
                <div class="col-md-8">
                    <input type="date" class="form-control" id="dob" name="dob">
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="" class="form-label fs-4 fw-bolder">Marital Status:</label>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col">
                            <input type="radio" id="married" name="marital" value="Married">
                        <label for="married" class="form-label fs-4 fw-bolder">Married</label>
                        </div>
                        <div class="col">
                            <input type="radio" id="unmarried" name="marital" value="Unmarried">
                        <label for="unmarried" class="form-label fs-4 fw-bolder">Unmarried</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="domicile" class="form-label fs-4 fw-bolder">Domicile:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="domicile" name="domicile">
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="city" class="form-label fs-4 fw-bolder">City:</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="city" name="city">
                </div> 
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="mobile" class="form-label fs-4 fw-bolder">Mobile No:</label>
                </div>
                <div class="col-md-8">
                    <input type="tel" class="form-control" id="mobile" name="mobile">
                </div>
            </div>

            <div class="row pt-4">
                <div class="col-md-4">
                    <label for="photo" class="form-label fs-4 fw-bolder">Profile Photo:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>
            
            <div class="row pt-4">
                <div class="col">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="submit" >Submit</button>
                      </div>
                </div>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
