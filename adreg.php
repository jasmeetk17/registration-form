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
    <title>Registration Form</title>
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
                        <h4 class="card-title mt-2" align="center">Registration Form</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="sign_up_action.php">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>First name </label>
                                    <input type="text" name="fname" class="form-control" placeholder="First Name">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Last name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                </div> <!-- form-group end.// -->
                            </div> <!-- form-row end.// -->
                            <div class="form-row">
                            <div class="col form-group">
                                    <label>Fathers name </label>
                                    <input type="text" name="fathname" class="form-control" placeholder="Fathers Name">
                                </div> <!-- form-group end.// -->
                                <div class="col form-group">
                                    <label>Mothers name</label>
                                    <input type="text" name="mothname" class="form-control" placeholder="Mothers Name">
                                </div> <!-- form-group end.// -->
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Select Course</label>
                                    <select name="cour">
                                        <option value=" Course " name="course">Course</option>
                                        <option value=" BCA ">BCA</option>
                                        <option value=" BBA ">BBA</option>
                                        <option value=" B.Tech ">B.Tech</option>
                                        <option value=" MBA ">MBA</option>
                                        <option value=" MCA ">MCA</option>
                                        <option value=" M.Tech ">M.Tech</option>
                                    </select>

                                </div>
                                <div class="col form-group">
                                    <label>Select Gender</label>
                                    <input type="Radio" name="gender" id="m">Male
                                    <input type="Radio" name="gender" id="f">Female

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Phone No</label>
                                    <input type="number"class="form-control" name="phone"  >
                                </div>
                                <div class="col form-group">
                                    <label>Select State</label>
                                    <select name="state">
                                    <option value="Pb">Punjab</option>
                                    <option value="Hr">Haryana</option>
                                    <option value="Jammu">Jammu</option>
                                    <option value="Himachal">Himachal</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" name="email" class="form-control" placeholder="">
                                <small class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="cpassword">
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Select Photograph </label>
                                    <input type="file" name="passport" >


                                </div>
                                <div class="col form-group">
                                    <label>Select DMC </label>
                                    <input type="file" name="dmc" >

                                </div>
                            </div>
                            <b>
                                <hr>
                            </b>
                            <div class="form-row">
                                <div class="col form-group">

                                    <h6>
                                        <font align="left">Declaration By The Candidate</font>
                                    </h6>


                                    <input type="checkbox" <p>I hereby declare that the entries made and information
                                    supplied by
                                    me in this
                                    form
                                    is correct to the best of my knowledge and no relevant material has been
                                    concealed
                                    therein.
                                    </p>
                                </div>

                            </div>
                            <b>
                                <hr>
                            </b>
                            <div class="form-row">
                                <div class="col form-group">
                                    <h6>
                                        <font align="left">Note</font>
                                    </h6>
                                    </b>
                                    <p>Please check your above information carefully,there will be no option to change
                                        information after
                                        submission.
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register" class="btn btn-success btn-block" id="contBtn">
                                    Registered </button>
                            </div>
                            <div class="border-top card-body text-center">If you have already registered then you should
                                log in
                                <a href="log.php">Log In
                                </a>
                                </div>
                            </div>
                        </form>
                    </article>

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