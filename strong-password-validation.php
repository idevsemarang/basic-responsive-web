<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Home</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        #idev-header{
            margin: 10px;
            background-color: #673f8d;
            color: #ffffff;
        }

       
        .idev-alert{
            padding: 15px 10px;
            border-radius: 8px;
            font-size: 16px;
            background-color: #1a2530;
            text-align: center;
            font-weight: bold;
            color: #ffffff;
        }
        .password-level{
            height: 20px;
            width: 15%;
            padding: 2px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 6px;
            color: #ffffff;
        }

        .sh-pass{
            position: absolute;
            right: 53px;
            margin-top: 12px;
        }
        
    </style>
</head>

<body>
    
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Password Validation</h4>
                <i class="fa fa-braille"></i> Strong Password with indicator
            </div>
            <div class="col-2 col-md-2 col-lg-2 col-sm-2 px-0">
                <img width="64px" src="assets/images/profile.png" class="profile-picture float-end" alt="">
            </div>
        </div>
    </div>

    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0 game-layer">
                    <div class="card-body">

                        <h5>Registration Form</h5>
                        <hr>
                        <div class="mx-4">
                            <form action="test-rumpang.php" id="cloze-test-form" method="post">
                                <div class="body-section">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control mb-2">

                                    <label for="">Username</label>
                                    <input type="text" class="form-control mb-2">

                                    <label for="">Birth Date</label>
                                    <input type="date" class="form-control mb-2">

                                    <label for="">Password</label> 
                                    <div>
                                        <i class="fa fa-eye sh-pass" onclick="togglePassword()"></i>
                                        <input type="password" class="form-control mb-2" id="password" onkeyup="checkPasswordStrength()">
                                    </div>
                                    <div class="password-level">Weak</div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger w-100">Register</a>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        function togglePassword() {
            if ($("#password").attr("type") == "password") {
                $("#password").attr("type", "text")
                $(".sh-pass").css("opacity", 0.6)
            }else{
                $("#password").attr("type", "password")
                $(".sh-pass").css("opacity", 1)
            }
        }


        function checkPasswordStrength() {
            var password = $("#password").val()

            // Regular expressions to check for uppercase, lowercase, number, and symbol
            var upperCaseRegex = /[A-Z]/;
            var lowerCaseRegex = /[a-z]/;
            var numberRegex = /[0-9]/;
            var symbolRegex = /[^A-Za-z0-9]/;

            // Default to a weak password
            var strength = 'Weak';
            var color = '#d41829';
            var width = '20%';

            if (password.length >= 8 &&
                upperCaseRegex.test(password) &&
                lowerCaseRegex.test(password) &&
                numberRegex.test(password) &&
                symbolRegex.test(password)) {
                // If password meets all criteria
                strength = 'Strong';
                color = '#19bf9d';
                width = '100%';
            } else if (password.length >= 8 &&
                        (upperCaseRegex.test(password) ||
                        lowerCaseRegex.test(password) ||
                        numberRegex.test(password) ||
                        symbolRegex.test(password))) {
                // If password meets some but not all criteria
                strength = 'Medium';
                color = '#e8a90b';
                width = '65%';
            }

            $(".password-level").css({"width":width, "background":color})
            $(".password-level").text(strength)
        }

        
    </script>
</body>

</html>