<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Project 5</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="css/style.min.css" rel="stylesheet">

    <!-- Styles required by this views -->
    <style>
        html,
        body,
        main {
            width: 100%;
            height: 100%;
        }

        .open-hidden {
            display: none;
        }
    </style>
</head>

<body>
    <main class="d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body p-4">
                <h1>Login</h1>
                <p class="text-muted">Sign in to your account</p>
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>

                    <button id="loginButton" type="button" class="btn btn-block btn-success">Login</button>
                </form>
            </div>
            <div class="card-footer p-4">
                <div id="message" class="alert alert-danger open-hidden" role="alert">
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        $("#loginButton").on('click', function(e) {
            $.ajax({
                type: "post",
                url: "login.php",
                dataType: "json",
                data: {
                    "email": $("input[name='email']").val(),
                    "password": $("input[name='password']").val(),
                },
                success: function(data, status) {
                    console.log(data);
                    if (data.isAuthenticated) {
                        window.location = "index.php"
                    } else {
                        $("#message").html("Bad email or password");
                        $("#message").removeClass("open-hidden");
                    }
                },
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
            });
        })
    </script>
</body>

</html>