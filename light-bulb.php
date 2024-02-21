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
        #idev-header {
            margin: 10px;
            background-color: #ffc107;
            color: #ffffff;
        }


        .idev-alert {
            padding: 15px 10px;
            border-radius: 8px;
            font-size: 16px;
            background-color: #1a2530;
            text-align: center;
            font-weight: bold;
            color: #ffffff;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Light Bulb Switch</h4>
                <i class="fa fa-braille"></i> Impementing jQuery and HTML toggle
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
                        <img class="w-100" id="img-bulb" src="assets/images/light-bulb-off.png" alt="">

                        <label class="switch">
                            <input type="checkbox" id="cb-bulb">
                            <span class="slider round"></span>
                        </label>
                        <b id="label-switch">OFF</b>
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
        $("#cb-bulb").change(function(){
            var bulbImg = "assets/images/light-bulb-off.png"
            var labelSwitch = "OFF"

            if($(this).prop('checked')){
                bulbImg = "assets/images/light-bulb-on.png"
                labelSwitch = "ON"
            }
            $("#img-bulb").attr("src", bulbImg)
            $("#label-switch").text(labelSwitch)
        });
    </script>
</body>

</html>