<?php
    include "../config/notify.php";
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Cahaya Slipper Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="img/icon.png">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
    <div class="loginfm">
        <div id="loginbox">            
           <div id="loginform">
            <form method="post" action="cekLogin.php" name="basic_validate">
				
				 <div class="control-group normal_text"> <h3><img src="img/login.png" alt="Logo" /></h3></div>
				                      <?php getMessage(); ?>  
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="usr"required autocomplete="off" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pwd"required placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="form-actions" style="float: right;">
                    <span class=""><input type="submit" value="Login" class="btn btn-info"></span>
                    <span class=""><input type="reset" value="Reset" class="btn btn-warning"></span>
                </div>
            </form>
           </div>
        </div>
    </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script>
        <script src="js/jquery.min.js"></script> 
		<script src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.uniform.js"></script> 
		<script src="js/select2.min.js"></script> 
		<script src="js/jquery.validate.js"></script> 
		<script src="js/matrix.form_validation.js"></script>
    </body>

</html>
