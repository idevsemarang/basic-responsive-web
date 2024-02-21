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

        .line-star{
            font-size: 30px;
        }
        
    </style>
</head>

<body>
    
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Viral Pyramid</h4>
                <i class="fa fa-star"></i> Build pyramid from stars
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
                        <div class="pyramid-section text-center"></div>
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
        showPyramid(5)

        function showPyramid(levels) {
            var mHtml = ""
            for (let vertical = 1; vertical <= levels; vertical++) {
                var manyStarts = ""
                let horizontal = 0
                do {
                    manyStarts += "*"
                    horizontal ++
                } while (horizontal < vertical);
                mHtml += "<div class='line-star'>"+manyStarts+"</div>"
            }

            $(".pyramid-section").html(mHtml)
        }
    </script>
</body>

</html>