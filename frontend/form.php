<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="frontend/css/style.css">
    <script src="frontend/js/form.js"></script>
    <title>Online act</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

     <a class="navbar-brand" href="#">Online act</a>

    <!--<div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="">Rating<span class="sr-only"></span></a>
            </li>
        </ul>
    </div> -->
</nav>

        <div class="container">
            <div class="col-md-6 col-md-offset-3 mx-auto my-auto">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="panel-title text-center">Login</div>
                            <hr>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" class="col-lg-offset-1 col-lg-10 mx-auto" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" required placeholder=" ">
                                            <label class="form-control-placeholder" for="username">Username</label>
                                        </div>

                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" required placeholder=" ">
                                            <label class="form-control-placeholder" for="password">Password</label>
                                        </div>
                                        
                                        <div class="col-sm-6 col-sm-offset-3 mx-auto">
                                            <button type="submit" name="login-submit" id="login-submit" tabindex="3" class="form-control btn btn-login" value="LOGIN"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>