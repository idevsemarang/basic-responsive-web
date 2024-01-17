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

        .img-hover-zoom {
            height: 200px; /* Modify this according to your need */
            overflow: hidden; /* Removing this will break the effects */
        }

        .img-hover-zoom img {
            transition: transform .5s, filter 1.5s ease-in-out;
            filter: grayscale(100%);
        }

        .img-hover-zoom:hover img {
            filter: grayscale(0);
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div id="idevHeader" class="shadow d-flex" style="background-color: #d0d0d0;"> 
        <div class="header-title w-90">
            <h3 class="mb-0">Basic Logic</h3>
            <span>Change color and status based on stock quantity</span>
        </div>
        <div class="header-profile">
            <img width="64px" src="assets/images/profile.png" alt="">
        </div>
    </div>

    <div class="px-3">
        <div class="row list-sandals">

        </div>
    </div>

    <div class="modal fade" id="modalStock" tabindex="-1" aria-labelledby="modalStockLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalStockLabel">Update Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="txt-name"></label>
                    <input type="number" class="form-control input-qty">
                    <input type="hidden" class="form-control input-index">

                    <button type="button" onclick="updateStock()" class="btn btn-primary mt-3">Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        const arrProducts = [{
                name: 'Cute Rabbit',
                stock: 9,
                image: 'https://down-id.img.susercontent.com/file/id-11134207-7qul9-lfea05r2qw1yb8_tn',
            },
            {
                name: 'Sandal Merah',
                stock: 100,
                image: 'https://id-test-11.slatic.net/shop/3ea95c5572b977e6d5a6677dee7361fe.jpeg',
            },
            {
                name: 'Like Feminimisto',
                stock: 20,
                image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIrq20i1uZNq_bH3RPsMCdHT8Ke9i_y6-KtO1860Q5dXL3SFtYKnYpo-WyVfSz1j-N6us&usqp=CAU'
            },
            {
                name: 'Classico Aldero',
                stock: 23,
                image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRITT6w7CJiBg-lWw8qoGEKDqFYRQl1-Uj-CA&usqp=CAU'
            },
            {
                name: 'Man Blacky',
                stock: 80,
                image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7U9qvYQXYB-L1QP0Lp8ez3kxDdoRhQLIK2g&usqp=CAU',
            },
            {
                name: 'White Nice',
                stock: 20,
                image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMPP22wTYhQluXvd0UYAc4AdsUcK-WAlNz9w&usqp=CAU'
            },
        ]

        listStock()

        function listStock() {
            var htmlSandal = ""
            $(".list-sandals").css("opacity", 0.3)
            $.each(arrProducts, function(index, ap) {
                // Variable to store the stock status HTML
                var stockStatus = '';

                // Check if stock is greater than or equal to 10
                if (ap.stock >= 10) {
                    // Set stockStatus to 'Available' with a blue color
                    stockStatus = '<b class="text-primary float-end">Available</b>';
                } else if (ap.stock > 0 && ap.stock < 10) {
                    // Check if stock is greater than 0 and less than 10
                    // Set stockStatus to 'Limited' with an orange color
                    stockStatus = '<b class="text-warning float-end">Limited</b>';
                } else if (ap.stock === 0) {
                    // Check if stock is exactly 0
                    // Set stockStatus to 'Empty' with a red color
                    stockStatus = '<b class="text-danger float-end">Empty</b>';
                }

                // implement logic into cars
                htmlSandal += '<div class="col-md-4 col-4">'
                htmlSandal += ' <div class="card shadow border-0 my-2" onclick="showModalStock(' + index + ')" data-bs-toggle="modal" data-bs-target="#modalStock">'
                htmlSandal += '     <div class="card-body p-0">'
                htmlSandal += '         <div class="img-hover-zoom">'
                htmlSandal += '             <img src="' + ap.image + '" class="w-100" alt="">'
                htmlSandal += '         </div>'
                htmlSandal += '         <div class="caption-text p-2">'
                htmlSandal += '             <h6>' + ap.name + '</h6>'
                htmlSandal += '             <span>Stock:<b class="text-stock">' + ap.stock + '</b> ' + stockStatus + '</span>'
                htmlSandal += '         </div>'
                htmlSandal += '     </div>'
                htmlSandal += ' </div>'
                htmlSandal += '</div>'
            });

            $(".list-sandals").html(htmlSandal)
            $(".list-sandals").animate({
                opacity: 1
            }, 700)
        }


        function showModalStock(index) {
            $(".txt-name").text(arrProducts[index].name)
            $(".input-qty").val(arrProducts[index].stock)
            $(".input-index").val(index)
        }


        function updateStock() {
            $('#modalStock').modal('hide');

            var index = $(".input-index").val()
            var quantity = $(".input-qty").val()

            arrProducts[index]['stock'] = quantity

            listStock()
        }
    </script>
</body>

</html>