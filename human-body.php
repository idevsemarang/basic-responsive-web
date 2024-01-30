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

        .part-text{
            position: absolute;
            left: -90px ;
            width: auto;
            font-size: 14px;
            background-color: red;
            border-radius: 6px;
            color: #ffffff;
            padding: 10px;
            font-weight: bold;
            opacity: 0.9;
            display: none;
        }

        .hb-head{
            position: absolute;
            height: 200px;
            width: 200px;
            top: 50px;
            left: 36%;
        }

        .hb-chest{
            position: absolute;
            height: 100px;
            width: 120px;
            /* border: 1px solid red; */
            top: 260px;
            left: 42%;
            opacity: 0.6;
        }
        .hb-stomach{
            position: absolute;
            height: 50px;
            width: 120px;
            /* border: 1px solid red; */
            top: 360px;
            left: 42%;
        }
        .hb-right-hand{
            position: absolute;
            height: 58px;
            width: 100px;
            /* border: 1px solid red; */
            top: 388px;
            left: 26%;
        }
        .hb-left-hand{
            position: absolute;
            height: 58px;
            width: 100px;
            /* border: 1px solid red; */
            top: 388px;
            right: 28%;
        }
        .hb-left-foot{
            position: absolute;
            height: 50px;
            width: 100px;
            /* border: 1px solid red; */
            top: 580px;
            right: 37%;
        }
        .hb-right-foot{
            position: absolute;
            height: 50px;
            width: 100px;
            /* border: 1px solid red; */
            top: 580px;
            left: 36%;
        }

        .hb-head:hover .hb-head-text, 
        .hb-chest:hover .hb-chest-text,
        .hb-stomach:hover .hb-stomach-text,
        .hb-right-hand:hover .hb-right-hand-text,
        .hb-left-hand:hover .hb-left-hand-text,
        .hb-left-foot:hover .hb-left-foot-text,
        .hb-right-foot:hover .hb-right-foot-text
        {
            display: block;
        }

        .hb-head:hover, 
        .hb-chest:hover,
        .hb-stomach:hover,
        .hb-right-hand:hover,
        .hb-left-hand:hover,
        .hb-left-foot:hover,
        .hb-right-foot:hover
        {
            border: 1px solid red;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h3 class="mb-0">Human Body</h3>
                <i class="fa fa-cubes"></i> Introduction to the Human Body for kids
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
                        <div class="body-section text-center">
                            <img src="assets/images/human-body.jpeg" class="image-body" width="320px">
                            <div class="hb-head">
                                <div class="hb-head-text part-text">Head <br>(Kepala)</div>
                            </div>
                            <div class="hb-chest">
                                <div class="hb-chest-text part-text">Chest <br>(Dada)</div>
                            </div>
                            <div class="hb-stomach">
                                <div class="hb-stomach-text part-text">Stomach <br>(Perut)</div>
                            </div>
                            <div class="hb-left-hand">
                                <div class="hb-left-hand-text part-text">Left Hand <br>(Tangan Kiri)</div>
                            </div>
                            <div class="hb-right-hand">
                                <div class="hb-right-hand-text part-text">Right Hand <br>(Tangan Kanan)</div>
                            </div>
                            <div class="hb-left-foot">
                                <div class="hb-left-foot-text part-text">Left Foot <br>(Kaki Kiri)</div>
                            </div>
                            <div class="hb-right-foot">
                                <div class="hb-right-foot-text part-text">Right Foot <br>(Kaki Kanan)</div>
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