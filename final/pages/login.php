<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/login.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
                    <li><a class = "active" href = "#login">Login</a></li>
                    <li><a href = "signUp.php">Sign Up</a></li>
                    <li><a href = "rubric.php">Rubric</a></li>
                    <li><a href = "">Log Out</a></li>
                </ul>
            </div>
        </nav>
        <div class="text-center" style="padding:50px 0">
        	<div class="logo">login</div>
        	<!-- Main Form -->
        	<div class="login-form-1">
        		<form id="login-form" class="text-left">
        			<div class="login-form-main-message"></div>
        			<div class="main-login-form">
        				<div class="login-group">
        					<div class="form-group">
        						<label for="lg_username" class="sr-only">Username</label>
        						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
        					</div>
        					<div class="form-group">
        						<label for="lg_password" class="sr-only">Password</label>
        						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
        					</div>
        				</div>
        				<button id = "submit" type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
        			</div>
        			<div class="etc-login-form">
        				<p>new user? <a href="signUp.php">create new account</a></p>
        			</div>
        		</form>
        	</div>
        <!-- end:Main Form -->
        </div>
        <script>
            $("#submit").on("click", function(e){
                e.preventDefault();
	    		$.ajax({
	    			type: "POST",
	    			url: "../php/log.php",
	    			dataType: "json",
	    			data: {
	    			    "name":$("#lg_username").val(),
	    			    "pass":$("#lg_password").val(),
	    			},
                	success: function(data) {
                	   // console.log(data);
                	     
                    },
	                complete: function(data, status) { 
	                }
	               
	    		});
	    		window.location = "dashboard.php";
	    	})
        </script>
    </body>
</html>