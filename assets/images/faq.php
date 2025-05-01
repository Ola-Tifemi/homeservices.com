<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="fa/css/all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <title>About Us| Homeservices.com</title>
    <style>
        div{
            background-color: white;
            font-family: "Signika", serif;}
        .navbar-brand{
            font-size: large; 
            font-weight: 700;
        }
        #navbar ul li{
            padding-right: 30px;
            margin: 5px;
        }
        #navbar ul li a:hover{
            background-color: rgb(0, 132, 255);
            border-radius: 20px;    
        }
        .book{
            background-color: rgb(0, 132, 255);
            border-radius: 20px;    
        }
        .bgimg{
                background-color:aquamarine; min-height:400px; width: 100%; margin-top:60px; padding-bottom: 20px;
                background-image: url(happy-african-american-woman-cookiwebp.webp); background-size:cover; background-position:center;

          }
        .footer{
          background-color: aquamarine; background-image: url(dark-blue.webp); min-height: 300px; background-size:cover;
          width: 100%;
        }
        .navbar .buton a{
            text-decoration: none;
        }                
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-sm bg-body-transparent">
                    <div class="container-fluid fixed-top p-0 m-0">
                        <div class="p-2"> 
                                         <img src="logo.png" alt="brand logo" width="75px">
                          </div>
                      <span class="navbar-brand p-4">Home Services.com</span>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                       aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse px-5 align-left" id="navbar">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                          </li>
                     <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="aboutus.php">About Us</a>
                          </li>
                     <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="faq.php">FAQ</a>
                          </li>
                          <div class="dropdown px-5 mx-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Register Now!
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="vendregister.php">I Am A Vendor?</a></li>
                              <li><a class="dropdown-item" href="regsiter.php">I Need Home Services</a></li>
                              <li><a class="dropdown-item" href="login.php">Already Have An Account?</a></li>
                            </ul>
                          </div>                       
                        </ul>                    
                      </div>
                    </div>
                  </nav>  
            </div>
        </div>
        <div class="row bgimg">
           
        </div>
            <div class="row">
                <div class="text-center text-primary p-3  animate__animated animate__bounceInUp animate_delay-3s">
                    <h2>F-A-Q?</h2>
                    <hr><hr>
                  </div>
          
            </div>
            <div class="row p-3 m-1">
                <div class="col-md-12 footer text-white">
                    
                      <h4>Contact Us</h4>
                     <p></p>
                     
                </div>
              </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.js"></script> 
</body>
</html>