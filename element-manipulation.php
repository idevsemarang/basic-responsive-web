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

        .main-area{
            border: 1px solid #000000;
            padding: 8px;
        }
        
    </style>
</head>

<body>
    
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">DOM Manipulation</h4>
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
                            MAIN AREA
                        </div>
                    </div>
                </div>

                <div class="card shadow border-0">
                    <div class="card-body">
                        <input type="text" class="testing-text form-control mb-2">
                        <button class="btn btn-danger" type="button" onclick="setAppend()">APPEND</button>
                        <button class="btn btn-danger" type="button" onclick="setPrepend()">PREPEND</button>
                        <button class="btn btn-danger" type="button" onclick="setAfter()">AFTER</button>
                        <button class="btn btn-danger" type="button" onclick="setBefore()">BEFORE</button>
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
        function setAppend() {
            const mTarget = $(".main-area")

            var mText = $(".testing-text").val()
            mText = "<div>"+mText+"</div>"

            mTarget.append(mText)
        }


        function setPrepend() {
            const mTarget = $(".main-area")

            var mText = $(".testing-text").val()
            mText = "<div>"+mText+"</div>"

            mTarget.prepend(mText)
        }


        function setAfter() {
            const mTarget = $(".main-area")

            var mText = $(".testing-text").val()
            mText = "<div>"+mText+"</div>"

            mTarget.after(mText)
        }


        function setBefore() {
            const mTarget = $(".main-area")

            var mText = $(".testing-text").val()
            mText = "<div>"+mText+"</div>"

            mTarget.before(mText)
        }
    </script>
</body>

</html>