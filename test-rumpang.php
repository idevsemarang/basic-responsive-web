<?php
    $arrSentences = [
        ['text' => 'She is a talented artist', 'eliminate' => ['is']],
        ['text' => 'I prefer tea over coffee', 'eliminate' => ['prefer']],
        ['text' => 'I have a pet cat named Whiskers', 'eliminate' => ['have', 'named']],
        ['text' => 'I enjoy listening to music in my free time', 'eliminate' => ['in']],
        ['text' => 'Chrome adalah web browser buatan google ', 'eliminate' => ['browser', 'google']],
        ['text' => 'Linux adalah perangkat lunak open source', 'eliminate' => ['perangkat', 'open']],
    ];

    if($_POST['ans']){
        $answers = $_POST['ans'];
        $arrDatas = [];
        foreach ($arrSentences as $key1 => $as) {
            foreach ($as['eliminate'] as $key2 => $eliminate) {
                $status = false;
                if ($answers[$key1][$key2]  == $eliminate) {
                    $status = true;
                }
                $arrDatas[] = [
                    'key_1' => $key1,
                    'key_2' => $key2,
                    'status' => $status,
                ];
            }
        }
        echo json_encode($arrDatas);
        die();
    }

?>
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
        
    </style>
</head>

<body>
    
    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Cloze Test</h4>
                <i class="fa fa-braille"></i> fill the blank with the correct answer
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
                        <div class="idev-alert mb-4 text-score">Score 0</div>

                        <form action="test-rumpang.php" id="cloze-test-form" method="post">
                            <div class="body-section">
                                <?php foreach ($arrSentences as $key1 => $as): ?>
                                    <div class="my-2">
                                        <?php 
                                        $strSentence = $as['text'];
                                        foreach ($as['eliminate'] as $key2 => $eliminate) {
                                            $widthFormula = strlen($eliminate)*10+15;
                                            $inputField = "<input type='text' class='field-".$key1."-".$key2."' style='width:".$widthFormula."px;' name='ans[".$key1."][".$key2."]'>";
                                            $strSentence = str_replace(" ".$eliminate." "," ".$inputField." ",$strSentence);
                                        }
                                        echo ($key1+1).". ". $strSentence;
                                        ?>. 
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="text-center">
                                <hr>
                                <button type="submit" class="btn btn-sm btn-danger">Submit</a>
                            </div>
                        </form>
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
        $( "#cloze-test-form" ).on( "submit", function( event ) {
            event.preventDefault();
            var currentUrl = $(this).attr('action')
            var formDatas =  $(this).serializeArray()

            $.post( currentUrl, formDatas)
            .done(function( responses ) {

                var jsonRes = JSON.parse(responses)
                var score = 0
                $.each( jsonRes, function( key, jr ) {
                    var constColor = "red"
                    if(jr.status){
                        constColor = "blue"
                        score++
                    }
                    $(".field-"+jr.key_1+"-"+jr.key_2).css("border", "1px solid "+constColor)
                    $(".field-"+jr.key_1+"-"+jr.key_2).css("color", constColor)
                })
                setTimeout(
                    function() {
                        $("input").css("border", "1px solid #000000")
                        $("input").css("color", "#000000")
                    }, 
                3000);

                var totalScore = (score/jsonRes.length)*100

                $(".text-score").text("Score "+totalScore.toFixed(0))
            });
        });
        
    </script>
</body>

</html>