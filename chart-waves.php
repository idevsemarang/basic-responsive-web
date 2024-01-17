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
            <h3 class="mb-0">Transversal Waves</h3>
            <span>Draw transversal waves based on amplitude and frequency</span>
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
                            The wave function  
                            <b>y = Asin(kx−ωt+φ)</b><br>where k=2π/λ and ω=2πf <br><br>
                            A : <input type="number" id="input-amplitudo" value="0.5" style="width: 60px;"> (m), 
                            f : <input type="number" id="input-frequency" value="0.5" style="width: 60px;"> (Hz),
                            λ : <input type="number" id="input-lambda" value="4" style="width: 60px;"> (m)

                            <button type="button" class="btn btn-sm btn-outline-danger" style="padding: 3px 10px 3px 10px;margin-top: -2px;margin-left: 4px;" onclick="drawCanvas()">Show</button>
                        </div>
                        
                        <canvas id="canvasWaves" width="800" height="400"></canvas>
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
        var c = document.getElementById("canvasWaves");
        var ctx = c.getContext("2d");

        drawCanvas(); // Initial drawing

        // Redraw the canvas when the window is resized
        $(window).resize(function() {
            drawCanvas();
        });

        function drawCanvas() {
            $("#canvasWaves").hide();

            const width = c.width;
            const height = c.height;

            // Define constants
            const A = document.getElementById("input-amplitudo").value; // Amplitude
            const k = 1/document.getElementById("input-lambda").value; // Wave number
            const w = document.getElementById("input-frequency").value; // Angular frequency
            const phi = 0; // Phase shift

            var amplitude = document.getElementById("input-amplitudo").value,
                phase = 0,
                frequency = document.getElementById("input-frequency").value

            ctx.beginPath();
            ctx.strokeStyle = "red"; // Set the color for the sine wave (red)
            ctx.clearRect(0, 0, width, height);

            const t = new Array(width).fill(0).map((_, i) => i * Math.PI * 2 / width);
            const y = t.map(t => A * Math.sin(k * t - w * t + phi));
            const scaledY = y.map(y => (y + 1) * height / 2);

            ctx.beginPath();
            ctx.moveTo(0, scaledY[0]);
            for (let i = 1; i < width; i++) {
                ctx.lineTo(i, scaledY[i]);
            }

            ctx.stroke();

            // Set the color for the horizontal and vertical lines (black)
            ctx.beginPath();
            ctx.strokeStyle = "black";

            // Draw a horizontal line
            ctx.moveTo(0, 200);
            ctx.lineTo(c.width, 200);

            // Draw a vertical line
            ctx.moveTo(0, 0);
            ctx.lineTo(0, 400);

            ctx.stroke();

            $("#canvasWaves").fadeIn(2000);
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