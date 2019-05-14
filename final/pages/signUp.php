<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/signUp.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>Sign Up</title>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <nav>
            <div id="nav-bar">
                <ul>
                    <li><a href = "dashboard.php">Dashboard</a></li>
                    <li><a href = "login.php">Login</a></li>
                    <li><a class = "active" href = "#signUp">Sign Up</a></li>
                    <li><a href = "rubric.php">Rubric</a></li>
                    <li><a href = "">Log Out</a></li>
                </ul>
            </div>
        </nav>
        <div class="text-center" style="padding:50px 0">
        	<div class="logo">register</div>
        	<!-- Main Form -->
        	<div class="login-form-1">
        		<form id="register-form" class="text-left">
        			<div class="login-form-main-message"></div>
        			<div class="main-login-form">
        				<div class="login-group">
        					<div class="form-group">
        						<label for="reg_username" class="sr-only">Username</label>
        						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username">
        					</div>
        					<div class="form-group">
        						<label for="reg_password" class="sr-only">Password</label>
        						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
        					</div>
        					<div class="form-group">
        						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
        						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
        					</div>
        					<div id="errorSuccess">
        					    
        					</div>
        					<button id = "submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
        				</div>
        		</form>
        	</div>
        </div>
        <script>
        
            $("#submit").on("click", function(e){
                e.preventDefault();
                var username = $("#reg_username").val();
                var password = $("#reg_password").val();
                var confirm = $("#reg_password_confirm").val();
                //check matching passwords
                $.ajax({
                    type: "POST",
                    url: "../php/insertUser.php",
                    dataType: "json",
                    data: {
                        "user" : $("#reg_username").val(),
                        "password" : $("#reg_password").val(),
                        "confirmation" : confirm,
                    },
                    success: function(data){
                        
                    },
                    complete: function(data, status){
                        
                    }
                });
                window.location = "dashboard.php";
            })
        </script>
    </body>
</html>
