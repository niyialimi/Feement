<!doctype html>
<html class="no-js" lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> ::New Account </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" href="assets/favicon.png">
        <link rel="stylesheet" href="css/feevendor.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">        
        <link rel="stylesheet" href="css/app-css.css">
      <style>
       #message{
		position:absolute;
		top:40%;
		left:10%;
		width:400px;
		}
      </style> 
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header" style="margin-top:10%;">
                        <h1 class="auth-title">
                            <div class="log"> <span><img src="assets/favicon.png" width="48" height="47"></span>   Feement Login</div> 
                      </h1>
                    </header>
                    <div class="auth-content">
                    <div class="row"><div class="col-md-6"><a href="" class="btn btn-info">Signup with Facebook</a></div><div class="col-md-6"><a href="" class="btn btn-danger">Signup with Google+</a></div></div>
                        <p class="text-xs-center">SIGNUP TO ACCESS OUR SERVICES</p>
                      <form id="signup-form" action="" enctype="multipart/form-data"  class="signup"  method="POST" role="form" data-toggle="validator">
                         <div class="form-group"> <label for="email">Email</label> <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required=""> </div>
                         <div class="help-block with-errors"></div>
                         
                            <div class="form-group"> <label for="firstname">Name</label>                            
                                <div class="row">
                                    <div class="col-sm-6"> <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter firstname" data-error="Firstname cannot be empty" required=""></div>
                                    
                                    <div class="col-sm-6"> <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Surname/Lastname" data-error="Lastname cannot be empty" required=""></div>
                                </div>
                            </div><div class="help-block with-errors"></div>
                           
                           <div class="form-group"> <label for="phone">Mobile Number</label> <input type="text" class="form-control" name="cphone" id="cphone" placeholder="Enter Phone Number" required=""></div><div class="help-block with-errors"></div>
                           
                            <div class="form-group"> <label for="password">Password</label>
                                <div class="row">
                                    <div class="col-sm-6"> <input type="password" class="form-control" data-minlength="8" maxlength="250" name="password" id="password" placeholder="Enter password" required=""> </div>
                                    <div class="col-sm-6"> <input type="password" class="form-control" data-match="#password" name="retype_password" id="retype_password" placeholder="Re-type password" required=""></div>
                                </div>
                            </div><div class="help-block with-errors"></div>
                            
                            <div class="form-group"> <label class="control-label">Register As</label>
                                    <div> <label>
			                    <input class="radio" name="crole" id="crole" type="radio" value="parent" checked>
			                    <span>Parent</span>
			                </label> <label>
			                    <input class="radio" name="crole" id="crole" type="radio" value="school">
			                    <span>School</span>
			                </label> <label>
			                    <input class="radio" name="crole" id="crole" type="radio" value="organization">
			                    <span>Organization</span>
			                </label> </div>
                                </div>
                            
                            <div class="form-group"> <label for="agree"></label>
                            <input  name="agree" id="agree" type="checkbox" required /> 
                            <span>Agree the terms and <a href="policy.php">policy</a></span>
                           </div><div class="help-block with-errors"></div>
          
                            <div class="form-group"> <button type="button" name="regbut" id="regbut" class="btn btn-block btn-success" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Adding New Record">Sign Up</button> </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">Already have an account? <a href="index.php">Login!</a></p>
                            </div>
                        </form>
                       <div id="message"></div>
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
    </body>

</html>