<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OTP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        .section-page{
            padding: 20px;
        }
        .otp-section{
            display: flex;
            justify-content: center; /* Horizontally center the flex items */
            margin: auto;
        }
        .form-otp{
            width: 20%;
            padding: 10px 8px;
            border: 1px solid #f3890b;
            border-radius: 6px;
            margin: 1px;
            font-size: 24px;
            text-align: center; 
        }
    </style>
</head>

<body>


    <div class="section-page">
        <div class="row mx-0 my-3">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card shadow border-0 mb-2 bg-warning text-center">
                    <div class="card-body">
                        <h2>Demo OTP</h2>
                    </div>
                </div>

                <div class="card shadow border-0 otp-layer">
                    <div class="card-body">
                        <div class="message-section text-center">
                            <p>Please enter your OTP  <span id="countdown"></span> seconds</p>
                        </div>
                        <div class="otp-section">
                        <?php for ($i=1; $i <= 5; $i++): ?>
                            <input type="text" class="form-otp" maxlength="1">
                        <?php endfor; ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exif-js/2.3.0/exif.js"></script>

    <script>
        $(document).ready(function() {
            var correctOtp = "jonhy"
            var countdown = 30; 
            var countdownInterval = setInterval(updateCountdown, 1000);

            updateCountdown();
            $('.form-otp:eq(0)').focus()
            
            $('.form-otp').on('input', function() {
                var $this = $(this);
                if ($this.val().length >= $this.attr('maxlength')) {
                    $this.next('.form-otp').focus();
                }
            });

            $('.form-otp:last').on('input', function() {
                var isFilled = $('.form-otp').toArray().every(function(element) {
                    return $(element).val().length > 0;
                });
                if (isFilled) {
                    clearInterval(countdownInterval); 

                    var otpValues = ""
                    $('.form-otp').each(function(index, valOtp) {
                        otpValues += $(this).val()
                    });
                    if (otpValues === correctOtp) {
                        $(".otp-section").html("<b class='text-primary'>Completed</b>")
                        $(".message-section").html("<h1><i class='fas fa-check text-primary'></i></h1>")
                    }else{
                        $(".otp-section").html("<b class='text-danger'>Incorrect OTP</b>")
                        $(".message-section").html("<h1><i class='fas fa-times text-danger'></i></h1>")
                    }
                }
            });


            function updateCountdown() {
                $('#countdown').text(countdown); 
                if (countdown === 0) {
                    $('.form-otp').prop('disabled', true);
                    $(".otp-section").html("<b class='text-danger'>TIMEOUT</b>")
                    $(".message-section").html("<h1><i class='fas fa-clock text-danger'></i></h1>")
                    return;
                }
                countdown--; 
            }

        });
    </script>

</body>

</html>