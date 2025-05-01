<?php

            session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home Services: Admin</title>
       
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
    </head>

        <!-- end of navbar -->
            <div class="row py-5 my-5">
                <div class="col-md-6 shadow-lg bg-body-transparent rounded p-3">
                    <form action="process/process_login.php" method="post" id="log" class="p-3">
                        <h1>Log In</h1>
                        <?php
                                            if(isset($_SESSION['adminerr'])){
                                    ?>
                                                <div class="alert alert-danger">
                                                <p><?php echo $_SESSION['adminerr'] ;?></p>
                                                <p><?php unset ($_SESSION['adminerr']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                    ?>
                                    <?php
                                            if(isset($_SESSION['feedback'])){
                                    ?>
                                                <div class="alert alert-info">
                                                <p><?php echo $_SESSION['feedback'] ;?></p>
                                                <p><?php unset ($_SESSION['feedback']) ;?></p>
                                                </div>
                                    <?php
                                            }
                                            ?>
                        <div class="mb-2 form-floating">
                        <input type="username" placeholder="Username" name="user" class="form-control">
                        <label for="Username">Username</label><br><br>
                        </div>
                        <div class="mb-2 form-floating">
                        <input type="password" placeholder="Password" name="pass" class="form-control">
                        <label for="password">Password</label><br><br>
                        </div>
                        <div class="mb">
                       <button class="btn btn-outline-primary col-10 m-2 p-3" name="btnlogin" type="submit">Log In</button>
                        </div>
                    </form>
                    <br>
                    <span>New User?<a href="regsiter.php" class="p-2 ">Sign Up</a></span>
                    <span> | New Service Provider?<a href="vendregister.php" class="p-2">Log In</a></span>
                </div>
                <div class="col-md-6">
                   <div class="shadow-lg bg-body-transparent rounded ">
                    <img src="assets/images/brand-page-laptop.png" alt="brand laptop" width="100%" >
                   </div>
                </div>
            </div>
        </div>
          
<?php require_once "partials/footer.php"?>
           