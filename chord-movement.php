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
        #idev-header {
            margin: 10px;
            background-color: #ffc107;
            color: #ffffff;
        }

    </style>
</head>

<body>

    <!-- section header -->
    <div class="section-header">
        <div id="idev-header" class="row shadow my-2">
            <div class="col-10 col-md-10 col-lg-10 col-sm-10 px-0">
                <h4 class="mb-0">Light Bulb Switch</h4>
                <i class="fa fa-braille"></i> Impementing jQuery and HTML toggle
            </div>
            <div class="col-2 col-md-2 col-lg-2 col-sm-2 px-0">
                <img width="64px" src="assets/images/profile.png" class="profile-picture float-end" alt="">
            </div>
        </div>
    </div>

    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-12">
                
                <div class="bg-white shadow border-0 p-4">
                    <select name="" class="form-control" id="basic-tone"></select>
                    <hr>
                    <span class="base-chord">D</span> <span class="base-chord">E</span>m
                    <p>Heal the world make it a better place</p> 
                    <span class="base-chord">A</span> <span class="base-chord">D</span>
                    <p>for you and for me and the entire human race</p>
                    <span class="base-chord">B</span>m <span class="base-chord">F#</span>m <span class="base-chord">G</span> <span class="base-chord">F#</span>m
                    <p>There are people dying if you care enough for the living</p>
                    <span class="base-chord">E</span>m <span class="base-chord">A</span> <span class="base-chord">D</span>
                    <p>make a better place for you and for me</p>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        const arrNotations = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"]

        $.each(arrNotations, function(index, value) {
            $('#basic-tone').append($('<option>', {
                value: value,
                text: value
            }));
        });

        changeBasicTone("D", "E")

        function changeBasicTone(from, to) {
            const indexFrom = arrNotations.indexOf(from);
            const indexTo = arrNotations.indexOf(to);
            const delta = indexTo - indexFrom
            console.log(delta);

            $( ".base-chord" ).each(function( index ) {
                const otherChord = arrNotations.indexOf($(this).text());
                var chordTo = delta + otherChord
                if (chordTo < 0) {
                    chordTo = arrNotations.length + chordTo
                }else if(chordTo > arrNotations.length ){
                    chordTo = chordTo - arrNotations.length 
                }

                console.log(chordTo);
                console.log("FROM :"+ $(this).text()+" TO: "+arrNotations[chordTo])
                $(this).text(arrNotations[chordTo])
            });
        }

       


    </script>
</body>

</html>