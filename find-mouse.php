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
            background-color: #8d663f;
            color: #ffffff;
        }

        .game-layer{
            /* background-image: url(https://t4.ftcdn.net/jpg/00/46/42/77/360_F_46427763_otDudWrMAaOyRsSVKpZQMaieZnB7LpW0.jpg); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }

        .score-section > span{
            font-weight: bold;
            font-size: 10px;
            background-color: yellow;
            color: #000000;
            opacity: 0.8;
            padding: 3px;
            border-radius: 6px;
        }

        .list-door{
            transition: transform .5s, filter 1.5s ease-in-out;
            filter: grayscale(50%);
            transform: scale(0.8);
        }

        .list-door:hover{
            cursor: pointer;
            filter: grayscale(0);
            transform: scale(1);
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
        
    </style>
</head>

<body>
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Find A Mouse</h4>
                <i class="fa fa-search"></i> Where are you, mouse?
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
                        <div class="idev-alert">Knock the door now!</div>
                        <div class="score-section text-center my-2 text-danger">Score xxx</div>
                        <div class="body-section text-center">
                            <div class="row">
                                <?php for($i = 1; $i <= 9; $i++): ?>
                                <div class="col-4 col-md-4 p-1">
                                    Pintu <?= $i; ?>
                                    <img src="assets/images/door.png" class="border-0 my-1 door-<?= $i; ?> img-thumbnail list-door" onclick="openTheDoor(<?= $i; ?>)" alt="">
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <hr>
                            <button type="button" class="btn btn-sm btn-danger" onclick="resetGame()">Reset Score</a>
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
        const secretNumber = Math.floor(Math.random() * 9) + 1;
        var chance = 3
        var score = parseInt(localStorage.getItem("fm_score"))
        console.log(secretNumber);

        $(".score-section").html("<b><small>Score "+score+"</small></b>")

        function resetGame(params) {
            localStorage.setItem("fm_score", 0)

            $(".score-section").html("Reset in progress...")
            $(".list-door").removeAttr("onclick")
            $(".btn").attr('disabled', 'disabled')

            setTimeout(function() {
                    location.reload();
                }, 3000);
        }

        function openTheDoor(number)
        {
            $(".door-"+number).removeAttr("onclick")
            var appendPoint = ""

            if (number === secretNumber) {
                $(".door-"+number).attr("src", "assets/images/mouse.png")
                $(".list-door").removeAttr("onclick")
                appendPoint = " <span>+100 point</span"

                makeAlert("<b>You Found It!</b>", "#4cd2ed")

                score += 100
                
                localStorage.setItem("fm_score", score);

                setTimeout(function() {
                    location.reload();
                }, 2000);
            }else{
                chance--
                score -= 10
                
                localStorage.setItem("fm_score", score)
                $(".door-"+number).attr("src", "assets/images/bomb.png")
                appendPoint = " <span>-10 point</span"

                var strChance = "chance"
                if (chance > 1) {
                    strChance = "chances"
                }

                makeAlert("<b>Oops! "+chance+" "+strChance+" left </b>", "#ffc107")
            }

            $(".score-section").html("<b><small>Score "+score+"</small></b>"+appendPoint)

            if (chance === 0) {
                makeAlert("Game Over!", "#dc3545")
                $(".list-door").removeAttr("onclick")

                setTimeout(function() {
                    location.reload();
                }, 2000);
            }
        }


        function makeAlert(message, color)
        {
            $(".idev-alert").html(message)
            $(".idev-alert").css("background-color", color)
        }

    </script>
</body>

</html>