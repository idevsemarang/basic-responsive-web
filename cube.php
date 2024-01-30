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
            background-color: #8fced48a;
        }

        .section-circle {
            border-radius: 50%;
            border: 2px solid #1abc9c;
            margin: 0px auto;
        }

        .line-radius {
            margin-top: 50%;
            border: 1px solid #adb5bd;
            font-size: 10px;
            text-align: center;
        }

        .section-simulation {
            height: 440px;
        }

        .bg-brown {
            background-color: #eaddb6;
        }

        .list-sandals .card:hover {
            opacity: 0.7;
        }

        canvas {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h3 class="mb-0">Cube Formula</h3>
                <i class="fa fa-cubes"></i> Calculate volume, surface area, diagonal and edge length of cube
            </div>
            <div class="col-2 col-md-2 col-lg-2 col-sm-2 px-0">
                <img width="64px" src="assets/images/profile.png" class="profile-picture float-end" alt="">
            </div>
        </div>
    </div>

    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="caption-section mb-4">
                            Here are cube all formulas for a cube of side length "a", <br>
                            a : <input type="number" id="input-length" value="1" style="width: 100px;"> (cm), 
                           
                            <button type="button" class="btn btn-sm btn-outline-danger" style="padding: 3px 10px 3px 10px;margin-top: -2px;margin-left: 4px;" onclick="countShow()">Show</button>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <img src="assets/images/kubus.png" class="image-cube" style="width:0px;">
                            </div>
                            <div class="col-5">
                                <div class="section-formula" style="display: none;">
                                    <li>
                                        Volume = a <sup>3</sup><br>
                                        &nbsp;  &nbsp;&nbsp; = <span class="label-volume"></span><sup>3</sup><br> 
                                        &nbsp;  &nbsp;&nbsp; = <span class="result-volume"></span> cm<sup>3</sup>
                                    </li>
                                    <li>
                                        Surface Area = 6a <sup>2</sup> <br>
                                        &nbsp;  &nbsp;&nbsp; = 6 <i class="fa fa-times"></i> <span class="label-sa"></span><sup>2</sup><br> 
                                        &nbsp;  &nbsp;&nbsp; = <span class="result-sa"></span> cm<sup>2</sup>
                                    </li>
                                    <li>
                                        Diagonal = a√3 <br>
                                        &nbsp;  &nbsp;&nbsp; = <span class="result-diagonal"></span>√3 cm
                                    </li>
                                    <li>
                                        Edge Length = 12a<br>
                                        &nbsp;  &nbsp;&nbsp; = 12 <i class="fa fa-times"></i> <span class="label-el"></span><br> 
                                        &nbsp;  &nbsp;&nbsp; = <span class="result-el"></span> cm<sup></sup>
                                    </li>
                                </div>
                                
                            </div>
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
        function countShow() {
            var inputLength = $("#input-length").val()
            var simulateWidth = inputLength*10 + 100

            var mVolume = Math.pow(inputLength,3).toFixed(2)
            var mSa = (6*Math.pow(inputLength,2)).toFixed(2)
            var mEl = (12*inputLength).toFixed(2)

            $(".label-volume, .label-sa, .label-el").text("("+inputLength+")")
            $(".result-diagonal").text(inputLength)
            $(".result-volume").text(mVolume)
            $(".result-sa").text(mSa)
            $(".result-el").text(mEl)

            $(".image-cube").animate({
                width: simulateWidth + "px",
            })

            $(".section-formula").fadeIn(2000)
        }
       
    </script>
</body>

</html>