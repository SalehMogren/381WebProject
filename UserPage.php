<?php
session_start();

if (!isset($_COOKIE['vaa']))
    header('location:Login.php?error=Please login ');
include 'includes/DbConfig.php';
mysqli_select_db($conn,$dbName);
$userEmail = $_COOKIE['email'];
$qUser = "select name from usertable where email = '$userEmail';";
    $result= mysqli_query($conn,$qUser);
$userName = mysqli_fetch_assoc($result)['name'];



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Features - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand logo" href="#">Brand</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="UserPage.php">Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="includes/Logout.php">Logout</a></li>

            </ul>
        </div>
    </div>
</nav>
<main class="page">
    <section class="clean-block features">
        <div class="container">
            <div class="d-inline float-left block-heading"
                 style="margin-bottom: 0;margin-right: 39px;padding-bottom: 0;padding-right: 11px;padding-top: 24px;padding-left: 0;">
                <img class="rounded img-fluid border d-flex" style="width: 200;height: 132px;margin: 0px;"
                     src="assets/img/avatars/avatar1.jpg" loading="auto">

                <p class="lead border rounded d-table-cell float-none" style="font-size: 44px;"><strong><?php echo $userName?></strong>
                </p>
            </div>
            <div class="row justify-content-center" style="margin-top: 50px;">

                <div class="col-md-5 feature-box"><i class="icon-envelope icon"></i>
                    <h4><a href="MyMassages.php" class="nav-link">My Massages</a></h4>
                    <p></p>
                </div>
                <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                    <h4><a href="AddProduct.php" class="nav-link">Add Product</a></h4>
                    <p></p>
                </div>
                <div class="table-responsive border rounded border-dark"
                     style="width: 890px;height: 183px;font-size: 21px;margin-top: 43px;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Products</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $qProduct = "select * from products where user_id = '$userEmail'";

                        $resultP = mysqli_query($conn,$qProduct);
                        $pCounter = mysqli_num_rows($resultP);

                            if($pCounter>0)
                            while($userProdcuts = mysqli_fetch_assoc($resultP)){
                               // $pId = $userProdcuts['p_id'];
                                $allo="" . $userProdcuts['p_id'] . "";
                                $_SESSION['REMOVE']=$allo;
                                $_SESSION['EDIT']=$allo;

                                echo "<tr> 
                            <td  ><a href='product-page.php?test=" . $userProdcuts['p_id'] . "'>  ". $userProdcuts['p_name'] ." </a> 
                            <td>
                            <button class='btn btn-info'
                            
                            ><a href='includes/tes.php?test3=$allo' >Edit</a>  </button>  
                                </td>
                             <td> <button class='btn btn-danger'
                            
                            ><a href='includes/remove2.php?test3=$allo' style='text-decoration-style: unset'>Remove</a>  </button>
                              </td>
                              </td>
                             
                                 
                            
                                                   
   </td>

                        </tr>";
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="page-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5>Get started</h5>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="registration.php">Sign up</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© 2020 Copyright Text</p>
    </div>
</footer>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="assets/js/smoothproducts.min.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>