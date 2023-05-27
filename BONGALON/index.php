<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css"> 
    <link rel="stylesheet" href="./css/login.css">
   
    <title>BONGALON LAW OFFICE</title>
</head>
<body>  
    
        <!-- SECTION START HERE -->
      
                <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; ">
                    <div class="row "style="width:50%" >
                        <div class="col"> 
                            <div class="card"id="login-card">
                                <div class="card-body ">
                                    <form action="POST"> 
                                    <div class="banner mb-2" ><img src="./src/img/banner.png" alt="banner" class="rounded" style="width:100%"></div>
                                        <!-- <h6 class="text-center text-secondary mb-0">Login to your account</h6> -->
                                        <input type="email" class="form-control my-4 py-2" id="username"placeholder="Email Address">
                                        <input type="password" name="password" id="password" class="form-control my-4 py-2" placeholder="Password">
                                       <div class="row">
                                        <div class="col"><input type="radio" name="" id="remember"> Remember me</div>
                                        <div class="col  d-flex justify-content-end"><a href="" class="nav-link">Forgot your password</a></div>
                                       </div>
                                        <div class="text-center"> 
                                           <a href="./dashboard.php"><buton class="btn btn-secondary" style="background:#64220C; width:100px" >Login</buton></a> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
</body>
<script src="./vendor/js/bootstrap.bundle.min.js"></script>
</html>