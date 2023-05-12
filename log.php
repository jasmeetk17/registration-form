<?php
ob_start();
session_start();
require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main role="main" class="container">
        <style>
            body{
                background-image:url('download.jpg');
                background-size:cover;
            }
            .wrapper {
                padding-top: 30px;
            }
            .card-header{
                background-color: #8BC34A;
                color: #fff;
                font-family: 'Source Sans Pro', sans-serif;
            }
        </style>

<div class="row justify-content-center wrapper">
<div class="col-md-6">
<?php
            if(!empty($_SESSION['errors'])){
               ?>
               <div class="alert alert-danger"> 
                <ul>
                    <?php
                    foreach($_SESSION['errors'] as  $error){
                    print'<li>'. $error . '</li>';}
                    
                    ?>

               </ul>
               </div>
               <?php

                unset($_SESSION['errors']);
}?>

                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2" align="center">Log In</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="sign_in_action.php">
                            <div class="form-group">
                                <label>Gmail</label>
                                <input type="alphanumeric" name="email" class="form-control" placeholder="Enter your gmail">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Login" class="btn btn-success btn-block" id="contBtn">
                            </div>
                        </form>
                    </article>
                    <div class="border-top card-body text-center">If you haven't registered yet then click here for
                        registration <a href="adreg.php">Registration
                        </a></div>

                </div>
            </div>

        </div>

    </main>

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>