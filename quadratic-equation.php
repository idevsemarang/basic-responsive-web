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

        .line-radius {
            margin-top: 50%;
            border: 1px solid #adb5bd;
            font-size: 10px;
            text-align: center;
        }

        .section-simulation {
            height: 440px;
        }

        .bg-brown {
            background-color: #eaddb6;
        }

        .list-sandals .card:hover {
            opacity: 0.7;
        }

        canvas {
            width: 100%;
        }
    </style>
</head>

<body>
    <div id="idevHeader" class="shadow d-flex">
        <div class="header-title w-90">
            <h3 class="mb-0">Quadratic equations</h3>
            <span>Factorization of Quadratic Equations</span>
        </div>
        <div class="header-profile">
            <img width="64px" src="assets/images/profile.png" alt="">
        </div>
    </div>

    <div class="px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="caption-section mb-4">
                            The Standard Form of a Quadratic Equation
                            <b>ax<sup>2</sup>+bx+c = 0<br><br>
                            a : <input type="number" id="input-a" value="1" style="width: 60px;">, 
                            b : <input type="number" id="input-b" value="5" style="width: 60px;">,
                            c : <input type="number" id="input-c" value="6" style="width: 60px;">

                            <button type="button" class="btn btn-sm btn-outline-danger" style="padding: 3px 10px 3px 10px;margin-top: -2px;margin-left: 4px;" onclick="calculateQuadratic()">Show</button>
                        </div>

                        <div id="equation-result">
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

        /**
         (2x+1)(x-4) = 2x2-7x-4
         (2x+3)(2x-1) = 4x2+4x-3
         (3x+5)(5x-3) = 15x2+16x-15
         */
        console.log(findFPB(8))

    function findFPB(num)
    {
        var fpb = []
        for (let index = 1; index <= num; index++) {
            if (num % index === 0) {
                fpb.push(index) 
            }
        }

        return fpb
    }


    function toPecahan(pembilang, penyebut){
        var pecah = []
        var mPembilang = 1 //Math.abs(pembilang) / Math.abs(penyebut)
        var mPenyebut = 1
        var symbolPembilang = 1;
        var symbolPenyebut = 1;
        if(pembilang < 0){
            symbolPembilang = -1;
        }
        if(penyebut < 0){
            symbolPenyebut = -1;
        }
        console.log("pm::"+pembilang+" >> pny ::"+penyebut);
        // pm::12 >> pny ::8
        // 1, 2,3,4,5,6,7,8
        // pm::-18 >> pny ::30

        var absPembilang = Math.abs(pembilang)
        var absPenyebut = Math.abs(penyebut)
        
        if ( absPembilang > absPenyebut) {
            if (absPembilang % absPenyebut === 0) {
                mPembilang = absPembilang / absPenyebut
                mPenyebut = 1
            }else{
                findFPB(absPenyebut).forEach(element => {
                    if (absPembilang % element === 0) {
                        mPembilang = (absPembilang / element)
                        mPenyebut = absPenyebut/element
                    }
                });
            }
        }else if(absPembilang < absPenyebut) {
            if (absPenyebut % absPembilang === 0) {
                mPembilang = 1
                mPenyebut = absPenyebut / absPembilang
            }else{
                findFPB(absPembilang).forEach(element => {
                    if (absPenyebut % element === 0) {
                        mPembilang = absPembilang/element
                        mPenyebut = (absPenyebut/element)
                    }
                });
            }
        }

        // if (pembilang % penyebut === 0) {
        //     mPembilang = (pembilang / penyebut)
        //     mPenyebut = -1
        //     if(penyebut > 0){
        //         mPenyebut = 1
        //     }
        // }

        pecah.pembilang = symbolPembilang*mPembilang
        pecah.penyebut = symbolPenyebut*mPenyebut

        console.log(pecah);
        return pecah
    }


    function frontFormatter(a){
        var labelX = a
        if(a == 1){
            labelX = "x"
        }else{
            labelX = a+"x"
        }

        return labelX 
    }


    function backFormatter(a){
        var labelBack = a
        if(a > 0){
            labelBack = "+"+a
        }else{
            labelBack = a
        }

        return labelBack
    }


    function calculateQuadratic() {
        $("#equation-result").hide();

        // Get values of a, b, and c from the form
        const a = parseInt($("#input-a").val())
        const b = parseInt($("#input-b").val())
        const c = parseInt($("#input-c").val())

        // Calculate the discriminant
        var discriminant = b * b - 4 * a * c;

        // Check if the discriminant is non-negative
        if (discriminant >= 0) {

            var root1 = (-b + Math.sqrt(discriminant))
            var root2 = (-b - Math.sqrt(discriminant))

            var factor1 = toPecahan(-root1, 2*a)
            var factor2 = toPecahan(-root2, 2*a)

            var labelX1 = frontFormatter(factor1.penyebut)
            var labelX2 = frontFormatter(factor2.penyebut)
            var labelBack1 = backFormatter(factor1.pembilang)
            var labelBack2 = backFormatter(factor2.pembilang)
            
            factor1 = "("+labelX1+""+labelBack1+")"
            factor2 = "("+labelX2+""+labelBack2+")"

            var mHtml = "<h5>"+frontFormatter(a)+"<sup>2</sup> "+backFormatter(b)+"x "+backFormatter(c)+" = 0</h5>";
            mHtml += "\nFactorized: " + factor1 + "" + factor2 + ""

            $("#equation-result").html(mHtml)
            $("#equation-result").fadeIn(2000)

        } else {
            $("#equation-result").html("The quadratic equation has no real roots.");
            $("#equation-result").fadeIn(2000);
        }
    }

        
        function counting() {
            $(".equation-section").hide();

            // (2x+1)(3x+2)
            // 6x2+4x+3x+2
            // 6x2+7x+2
            // Define constants
            const a = parseInt($("#input-a").val())
            const b = parseInt($("#input-b").val())
            const c = parseInt($("#input-c").val())

            var x1 = (-b + Math.sqrt(b*b - 4*a*c))/2*a
            var x2 = (-b - Math.sqrt(b*b - 4*a*c))/2*a

            x1 = x1.toFixed(2)
            x2 = x2.toFixed(2)

            var labelX1 = "+"+Math.abs(x1)
            var labelX2 = "+"+Math.abs(x2)

            if(x1 > 0)
            {
                labelX1 = "-"+Math.abs(x1)
            }
            if(x2 > 0)
            {
                labelX2 = "-"+Math.abs(x2)
            }

            var html = "<h5>"+a+"x<sup>2</sup> + "+b+"x + "+c+" = 0</h5>"
            html += "<h5>(x"+labelX1+")(x"+labelX2+") = 0</h5>"

            $(".equation-section").html(html);

            $(".equation-section").fadeIn(2000);
        }


        // function drawWave() {
        //     const canvas = document.getElementById('waveCanvas');
        //     const ctx = canvas.getContext('2d');

        //     ctx.clearRect(0, 0, canvas.width, canvas.height);

        //     const amplitude = 50;  // A
        //     const frequency = 2;   // f (Hz)
        //     const wavelength = 100; // λ (pixels)

        //     const time = new Date().getTime();

        //     for (let x = 0; x < canvas.width; x += 1) {
        //         const y = amplitude * Math.sin(2 * Math.PI * frequency * time / 1000 - 2 * Math.PI * x / wavelength);
        //         ctx.fillRect(x, canvas.height / 2 - y, 1, 1);
        //     }

        //     requestAnimationFrame(drawWave);
        // }

        // window.onload = function() {
        //     drawWave();
        // };
    </script>
</body>

</html>