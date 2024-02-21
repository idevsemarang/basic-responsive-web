<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .mborder{
            border: 1px solid #000000;
            border-radius: 8px;
            padding: 1px 10px 10px 10px;
        }
    </style>
</head>

<body>
    <div class="mborder">
        <h3>Wajib dibaca</h3> 
        <li>Quiz dikerjakan dalam waktu 1x24 jam</li>  
        <li>Kerjakan menggunakan bahasa pemrograman yang paling dikuasai (PHP, Python, C, dll)</li>  
        <li>Kirim jawaban Anda dalam bentuk .zip ke email idevsemarang@gmail.com dengan subject <br>
            &nbsp; &nbsp; &nbsp;MRPQUIZ-{Nama Anda}, <i>contoh MRPQUIZ-Joni Sudarsono</i> </li>  
    </div>
    <h5>QUIZ 1</h5>
    <p>
        Sebuah alat pengisi cairan drum otomatis memiliki debit yang konstan dan dapat diubah oleh operator.
        Debit cairan didefinisikan sebagai <b>D</b> dengan satuan m<sup>3</sup>/detik. <br>Drum memiliki volume maksimum <b>(Vmax)</b>, jenis cairan akan otomatis berubah saat pengisian mencapai 15%, 25%, dan 55% dari <b>Vmax</b>.
        Saat mencapai 90% <b>Vmax</b>, pengisian akan berhenti.<br>
        Anda diminta untuk membuat program yang bisa menampilkan output waktu mulai dan selesai pengisian drum tersebut serta tracking perubahan jenis cairan.  
    </p>

    <p>
        Berikut ini merupakan contoh input dan output dari sistem yang diinginkan: <br>
    </p>
<?php
$arrExperiment = [
    [
        'input_d' => 5,
        'v_tabung' => 1000,
        'date' => "2023-09-20 08:00:00",
    ],
    [
        'input_d' => 2.4,
        'v_tabung' => 3000,
        'date' => "2023-09-20 08:00:00",
    ],
    // [
    //     'input_d' => 3.8,
    //     'v_tabung' => 4300,
    //     'date' => "2023-09-20 08:00:00",
    // ],
];

foreach ($arrExperiment as $key => $ae) {
    echo ($key+1).". Operator melakukan input D = ".$ae['input_d']." m<sup>3</sup>/detik dan Vtabung = ".$ae['v_tabung']." m<sup>3</sup>, maka menghasilkan output: ";
    echo timeOfDebit($ae['input_d'], $ae['v_tabung'], $ae['date']) . "<br>";
}

?>

    <h5>QUIZ 2</h5>
    <p>
        Seorang ahli bahasa mengajak Anda membuat sebuah program untuk menghitung jumlah huruf vokal pada suatu kalimat.
    </p>

    <p>
        Berikut ini merupakan contoh input dan output dari sistem yang diinginkan: <br>
    </p>

<?php
$arrString = ["Makan Buah Apel", "OneSignal adalah layanan push notification yang paling banyak digunakan untuk pengembang web dan seluler"];

foreach ($arrString as $key => $as) {
    echo ($key+1). ". ".$as. "<br>".findVocal($as)."<br>";
}

function timeOfDebit($debit, $vMax, $takenTime = null)
{
    $originalDate = date("Y-m-d H:i:s");
    if (isset($takenTime)) {
        $originalDate = $takenTime;
    }
    
    $arrLiquidChange = [
        [
            'label' => 'Start Cairan A',
            'percent' => 0,
        ],
        [
            'label' => 'Start Cairan B',
            'percent' => 0.15,
        ],
        [
            'label' => 'Start Cairan C',
            'percent' => 0.25,
        ],
        [
            'label' => 'Start Cairan D',
            'percent' => 0.55,
        ],
        [
            'label' => 'Selesai',
            'percent' => 0.9,
        ],
    ];

    $txtResult = "";
    foreach ($arrLiquidChange as $key => $alc) {
        $resultTimeInSecond = round($alc['percent']*$vMax/$debit);
        $dateTime = new DateTime($originalDate);
        $dateTime->add(new DateInterval("PT{$resultTimeInSecond}S"));

        $finishTime = $dateTime->format("Y-m-d H:i:s");

        $txtResult .= "<li><b>".$alc['label']."</b> :: ".$finishTime."</li>";
    }
    
    return $txtResult;
}


function findVocal($mString)
{
    $vocals = ['a', 'i', 'u', 'e', 'o'];

    $txtResult = "";
    foreach ($vocals as $key => $vocal) {
        $substrCount = substr_count(strtolower($mString), $vocal);
        if ($substrCount > 0) {
            $txtResult .= "<li>".$vocal." (".$substrCount.")</li>";
        }
    }

    return $txtResult;
}

?>
    
</body>
</html>
