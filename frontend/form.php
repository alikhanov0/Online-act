<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="frontend/css/style.css">
    <script src="https://alcdn.msauth.net/lib/1.4.9/js/msal.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="frontend/js/form.js"></script>
    <title>Online act</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Online act</a>
    </nav>


        <div class="col-md-6 col-md-offset-3 mx-auto mt-5">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="panel-title text-center">Login</div>
                        <hr>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" class="col-lg-offset-1 col-lg-10 mx-auto" method="post" role="form" style="display: block;">
                                    <div class="col-sm-6 col-sm-offset-3 mx-auto">
                                        <button type="submit" name="login-submit" id="login-btn" tabindex="3" class="form-control btn btn-login" value="LOGIN" autocomplete="off">Login with Outlook</button>
                                    </div>
                                    <div class="mess"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
</html>