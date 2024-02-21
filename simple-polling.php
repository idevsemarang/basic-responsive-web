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

        .body-section{
            height: 720px;
        }

        .game-layer{
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("assets/images/bg-game.jpeg");
        }

        .score-section > span{
            font-weight: bold;
            font-size: 20px;
            background-color: #000000;
            opacity: 0.8;
            padding: 6px;
            border-radius: 6px;
        }

        .bucket{
            position: absolute;
            bottom: 0px;
            width: 74px;
        }
        .money{
            position: absolute;
            top: 0px;
            width: 32px;
        }
        
    </style>
</head>

<body>
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h3 class="mb-0">Food Polling</h3>
                <i class="fa fa-chart"></i> Catch money and become rich today
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
                        <div class="score-section">
                            <span class="font-weight text-warning">$ 0</span>
                        </div>
                        <div class="body-section text-center">
                            <img src="assets/images/dollar.png" class="money">
                            <img src="assets/images/bucket.png" class="bucket">
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
        var score = 0
        animateMoney()

        $("body").keydown(function(e) {
            if(e.keyCode == 37) { // left
                $(".bucket").css({
                    left: "-=10"
                });
            }
            else if(e.keyCode == 39) { // right
                $(".bucket").css({
                    left: "+=10"
                });
            }
        });

        function animateMoney() {
            // Initial animation to move money to 716px
            $(".money").show();

            $(".money").animate({ top: '740px' }, {
                duration: 5000,
                complete: function () {
                    // When animation completes, hide the money and reset its position
                    $(".money").hide();
                    resetMoneyPosition();
                    // Repeat the animation
                    animateMoney();
                },
                step: function () {
                    checkCollision();
                }
            });
        }

        function resetMoneyPosition() {
            // Reset the position of .money to the top with a random horizontal position
            var randomHorizontalPosition = Math.floor(Math.random() * ($(window).width() - $(".money").width()));
            $(".money").css({
                top: 0,
                left: randomHorizontalPosition
            });
        }


        function checkCollision() {
            var moneyPosition = $(".money").offset();
            var bucketPosition = $(".bucket").offset();

            // Check if the money position matches the bucket position
            if (moneyPosition.top >= bucketPosition.top && moneyPosition.left >= bucketPosition.left && moneyPosition.left <= bucketPosition.left + $(".bucket").width()) {
                // If there is a collision, display the text "horay"
                $(".money").hide();
                score+=10
            }
            $(".score-section span").text("$ "+score)
        }
       
    </script>
</body>

</html>