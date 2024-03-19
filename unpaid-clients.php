<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Unpaid Client</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            padding: 10px;
        }

        .btn-login:hover{
            position: absolute;
            left: 300px;
        }
       
    </style>
</head>

<body>

    <div class="row">
        <div class="col-10 col-md-4 col-lg-4 offset-md-4 offset-1">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h1>Abulabul Apps</h1>
                    <p>Please login with your account</p>
                    <label for="">Username</label>
                    <input type="text" class="form-control">

                    <label for="">Password</label>
                    <input type="password" class="form-control">

                    <button onclick="submitLogin()" class="btn btn-danger my-2 btn-login" type="button">Login</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>

    <script>
        function submitLogin() 
        {
            
        }

    </script>
</body>

</html>