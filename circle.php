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
        #idevHeader {
            margin: 16px;
        }
        .section-circle {
            border-radius: 50%;
            border: 2px solid #1abc9c;
            margin: 0px auto;
        }
        .line-radius{
            margin-top: 50%;
            border: 1px solid #adb5bd;
            font-size: 10px;
            text-align: center;
        }
        .section-simulation{
            height: 440px;
        }
        .bg-brown{
            background-color: #eaddb6;
        }
    </style>
</head>

<body>

    <div id="idevHeader" class="shadow d-flex">
        <div class="header-title w-90">
            <h3 class="mb-0">Circle Simulation</h3>
            <span>Circumference and Area</span>

        </div>
        <div class="header-profile">
            <img width="64px" src="assets/images/profile.png" alt="">
        </div>
    </div>

    <div class="px-3">
        <div class="row">
            <div class="col-sm-8">
                <div class="card shadow border-0 mt-2">
                    <div class="card-header bg-brown">
                        Simulation
                    </div>
                    <div class="card-body">
                        <div class="section-simulation">
                            <div class="section-circle">
                                <div class="line-radius"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <div class="col-sm-4">
                <div class="card shadow border-0 mt-2">
                    <div class="card-header bg-brown">
                        Configuration and Result
                    </div>
                    <div class="card-body">
                        <b>Radius </b> <span class="circle-radius"></span> <br>
                        <input type="range" id="set-radius" class="form-control" name="radius" min="7" max="43" value="7" /><br>
                        <b class="text-warning">RESULT</b><br>
                        <span>Circumference 2πr</span> <br><b class="circle-circumference"></b><br>
                        <span>Area πr<sup>2</sup></span> <br><b class="circle-area"></b>
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
        $(document).ready(function () {
            setCounting(7)

            $("#set-radius").change(function(){
                setCounting($(this).val())
            });
        });

        function setCounting(radius) {            
            const modRadius = radius*10

            // formula
            var circumference = 2*Math.PI*radius
            var area = Math.PI*Math.pow(radius, 2)

            // common case
            circumference = circumference.toFixed(2)
            area = area.toFixed(2)

            // special case for modulo 7
            if (radius % 7 === 0) {
                circumference = Math.round(circumference)
                area = Math.round(area)
            }

            // animate your circle based on radius
            $(".section-circle").animate({
                width: modRadius + "px",
                height: modRadius + "px"
            })
            $(".circle-radius").text(radius+" cm")
            $(".circle-circumference").text(circumference +" cm")
            $(".circle-area").html(area+" cm<sup>2</sup")

            // animate your radius line inside the circle
            $(".line-radius").hide()
            $(".line-radius").text(radius+" cm")
            $(".line-radius").css("width", modRadius/2 + "px")
            $(".line-radius").css("height","2px")
            $(".line-radius").fadeIn(2000)
        }
    </script>
</body>

</html>