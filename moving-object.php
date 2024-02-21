<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Moving Object</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        #idev-header{
            margin: 10px;
            background-color: #8fced48a;
        }

        .body-section{
            height: 500px;
        }

        .img-cat{
            position: absolute;
            width: 90px;
            top: 30%;
            left: 40%;
        }

    </style>
</head>

<body>
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h3 class="mb-0">Moving Object</h3>
                <i class="fa fa-cubes"></i> Move your object by click the button
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
                        <div class="body-section">
                             <img class="img-cat" src="assets/images/cat.png" alt="">
                        </div>
                        <div class="button-section text-center">
                            <button class="btn btn-danger" type="button" onclick="toLeft()">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-danger" type="button" onclick="toRight()">
                                <i class="fa fa-chevron-right"></i>
                            </button>
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
        // initialize horizontal position
        var horizontalPos = 40
        
        // create function move object to Right
        function toRight() 
        {
            horizontalPos ++
            // increment 1% to x positif
            $(".img-cat").css("left", horizontalPos+"%")
        }

        // create function move object to Left
        function toLeft() 
        {
            horizontalPos --
            // increment 1% to x negative
            $(".img-cat").css("left", horizontalPos+"%")
        }
        
       
    </script>
</body>

</html>