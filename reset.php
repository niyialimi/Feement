<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ::Reset Password </title>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/feevendor.css">
        <link rel="stylesheet" href="css/app-css.css">
        
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="log"> <span><img src="assets/favicon.png" width="48" height="47"></span>   Feement Login</div> 
                             </h1>
                    </header>
                    <div class="auth-content">
                        <p class="text-xs-center">PASSWORD RECOVER</p>
                        <p class="text-muted text-xs-center"><small>Enter your email address to recover your password.</small></p>
                        <form id="reset-form" action="/index.html" method="GET" novalidate="">
                            <div class="form-group"> <label for="email1">E-mail</label> 
                            <input type="email" class="form-control" name="email1" id="email1" placeholder="Your email address" required> </div>
                            
                            <div class="g-recaptcha" data-sitekey="6LdfPz4UAAAAANKcXlMpc93hS1m3rh9QYHV0QdvW"></div>
                            <br>
                            <div class="form-group"> <button type="submit" class="btn btn-block btn-success">Reset</button> </div>
                            <div class="form-group clearfix"> <a class="pull-left" href="index.php">return to Login</a> <a class="pull-right" href="signup.php">Sign Up!</a> </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
       
       
        <script src="js/feevendor.js"></script>
        <script src="js/feeapp.js"></script>
    </body>

</html>