<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ::Account Login </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="assets/favicon.png">
        <link rel="stylesheet" href="css/feevendor.css">
        <link rel="stylesheet" href="css/app-css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
            <div id="message"></div>
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="log"> <span><img src="assets/favicon.png" width="48" height="47"></span>   Feement Login</div> 
                            
                      </h1>
                    </header>                    
                    <div class="auth-content">
                    <div class="row"><div class="col-md-6"><a href="" class="btn btn-info">Login with Facebook</a></div><div class="col-md-6"><a href="" class="btn btn-danger">Login with Google+</a></div></div>
                        <p class="text-xs-center">LOGIN TO CONTINUE</p>
                        <form id="login-form" action="" enctype="multipart/form-data" class="signup"  method="POST" role="form" data-toggle="validator">                        
                            <div class="form-group"> <label for="username">E-Mail</label> 
                            <div class="input-group"><input type="email" class="form-control" name="username" id="username" placeholder="Your email address" required><!--span class="input-group-addon fa fa-envelope-o"></span--></div></div>
                            <div class="form-group"> <label for="password">Password</label> 
                            <div class="input-group"><input type="password" class="form-control" name="password" id="password" placeholder="Your password" required><!--span class="input-group-addon fa fa-key"></span--></div> </div>
                            <div class="form-group"> <label for="remember">
            <input class="" id="remember" type="checkbox"> 
            <span>Remember me</span>
          </label> <a href="reset.php" class="forgot-btn pull-right">Forgot password?</a> </div>
                            <div class="form-group"> <button type="submit" name="loginbut" id="loginbut" class="btn btn-block btn-success">Login</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Do not have an account? <a href="signup.php">Sign Up!</a></p>
                            </div>
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
        <script src="js/validator.js"></script>
        <script src="feelogic.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
		$(document).ready(function(){
			FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
			});
			});
		</script>
        <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    </body>

</html>