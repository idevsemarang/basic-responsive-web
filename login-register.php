<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Log Reg</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body{
            background-image: url(https://live.staticflickr.com/7592/16888464777_0073470e81_b.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .section-page{
            padding: 20px;
            margin-top:100px
        }
        .idev-form{
            width: 100%;
            padding: 6px 8px;
            border-radius: 6px;
            border: 1px solid #e6e6e6;
            margin-bottom: 6px;
        }

        .section-login, 
        .section-register{
            border-radius: 6px;
            padding: 10px;
            max-width: 320px;
            margin: 0px auto;
            background: #ffffff;
        }

        .section-register{
            display: none;
        }

        .idev-button{
            border-radius: 6px;
            border: 1px solid #768e90;
            background: #768e90;
            padding: 6px 10px;
            color: #ffffff;
            margin: 10px 0px;
        }
        .idev-button:hover{
            opacity: 0.8;
        }

        .switch-active{
            border-radius: 6px;
            background: #a9b6ad;
            padding: 6px 10px;
            color: #ffffff;
        }

        .switch-login, .switch-register{
            border-radius: 6px;
            border: 0px;
            background: #a9b6ad;
            padding: 6px 10px;
            color: #ffffff;
            width: 50%;
            margin: 4px;
        }

        .switch-panel{
            border: 1px solid #a9b6ad;
            background: #a9b6ad;
            border-radius: 6px;
            max-width: 320px;
            margin: 10px auto;
            display: flex;
        }

        .switch-active{
            background: #768e90;
        }

        label{
            font-size: 15px;
        }
    </style>
</head>

<body>

    <div class="section-page">
        <div class="switch-panel">
            <button type="button" class="switch-login switch-active">Login</button>
            <button type="button" class="switch-register">Register</button>
        </div>
        
        <div class="section-login">
            <form action="#" method="post">
                <h4>Login</h4>

                <label for="">Username</label>
                <input type="text" class="idev-form">

                <label for="">Password</label>
                <input type="password" class="idev-form">

                <button class="idev-button">Submit</button>
            </form>
        </div>

        <div class="section-register">
            <form action="#" method="post">
                <h4>Register</h4>

                <label for="">Name</label>
                <input type="text" class="idev-form">

                <label for="">Birthday</label>
                <input type="date" class="idev-form">

                <label for="">Username</label>
                <input type="text" class="idev-form">

                <label for="">Password</label>
                <input type="password" class="idev-form">

                <button class="idev-button">Submit</button>
            </form>
        </div>
    </div>
    

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $( document ).ready(function() {
            $(".section-register").hide()
        });

        $(".switch-login").click(function(){
            $(this).addClass("switch-active")
            $(".switch-register").removeClass("switch-active")

            $(".section-register").hide()
            $(".section-login").slideDown()

        });

        $(".switch-register").click(function(){
            $(this).addClass("switch-active")
            $(".switch-login").removeClass("switch-active")

            $(".section-register").slideDown()
            $(".section-login").hide()
        });
    </script>
</body>

</html>