<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sumo</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        #idev-header{
            margin: 10px;
            background-color: #3f8d74;
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

        .main-area{
            border-bottom: 1px solid #000000;
            padding: 8px;
        }
        .sumo-object{
            width: fit-content;
            position: relative;
        }

        .img-turtle{
            width: 64px;
            margin-bottom: -20px;
        }
        
    </style>
</head>

<body>
    
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Turtle Sumo</h4>
                <i class="fa fa-braille"></i> Append, prepend, before, after
            </div>
            <div class="col-2 col-md-2 col-lg-2 col-sm-2 px-0">
                <img width="64px" src="assets/images/profile.png" class="profile-picture float-end" alt="">
            </div>
        </div>
    </div>

    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="main-area">
                            <div class="sumo-object">
                                <img src="assets/images/turtle-left.png" class="img-turtle" alt="">
                                <img src="assets/images/turtle-right.png" class="img-turtle" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow border-0">
                    <div class="card-body">
                        <button class="btn btn-danger" type="button" onclick="pushToLeft()">PUSH</button>
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
        const maxWidth = $(".main-area").width()
        var centerWidth = (maxWidth/2) - 64

        updatePosition()
        var movingInterval = setInterval(pushToRight, 1000);

        function pushToLeft() 
        {
            centerWidth -= 10

            updatePosition()
        }

        function pushToRight() 
        {
            centerWidth += 10

            updatePosition()
        }

        function updatePosition()
        {
            const percentWidth = (centerWidth/maxWidth)*100

            if(centerWidth < 0.25*maxWidth)
            {
                clearInterval(movingInterval);
                alert("YOU WIN")
            }else if(centerWidth + 64 > 0.75*maxWidth)
            {
                clearInterval(movingInterval);
                alert("YOU LOSE")
            }

            $(".sumo-object").css("left", centerWidth+"px")
        }
    </script>
</body>

</html>