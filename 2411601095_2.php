<?php

function funcBerpapasan($jarakTempuh, $kecepatanAwal, $kecepatanNaik, $kecepatanBadu, $selisihWaktu)
{
  $waktu = 0;
  $posisiAli = 0;
  $posisiBadu = $jarakTempuh;
  $kecepatanAli = $kecepatanAwal;

  while ($posisiAli < $posisiBadu) {
    $waktu++;
    $posisiAli += $kecepatanAli;
    $kecepatanAli += $kecepatanNaik;

    if ($waktu >= $selisihWaktu) {
      $posisiBadu -= $kecepatanBadu;
    }
  }
  $jarakAkhir = $jarakTempuh - $posisiBadu;

  return "Detik Berpapasan " . $waktu . "<br> Jarak Badu dengan titik B setelah Berpapasan " . $jarakAkhir . " meter";
}

$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jarakTempuh = (int) $_POST['jarakTempuh'];
  $kecepatanAwal = $_POST['kecepatanAwal'];
  $kecepatanNaik = $_POST['kecepatanNaik'];
  $kecepatanBadu = $_POST['kecepatanBadu'];
  $selisihWaktu = (int) $_POST['selisihWaktu'];

  $hasil = funcBerpapasan($jarakTempuh, $kecepatanAwal, $kecepatanNaik, $kecepatanBadu, $selisihWaktu);
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>UAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h2>Perancangan dan Analisis Algoritma</h2>
    <p><b>Ini adalah UAS - Soal 2</b></p>

    <div class="form-group">
      <div>
        Jarak titik A dan titik B 1000 m.<br>
        Ali berangkat dari titik A ke titik B pukul 8 tepat ( 08:00:00 ) dengan kecepatan sebagai berikut :
        <li>Pada detik ke-1 kecepatannya 2 m per detik.</li>
        <li>Pada detik ke-2 kecepatannya 2.1 m per detik</li>
        <li>Pada detik ke-3 kecepatannya 2.2 m per detik</li>
      </div>
      <p>
        Demikian seterusnya setiap detik berikutnya kecepatannya
        selalu betmabah 0.1 m per detik.<br>
        Badu berangkat dari titik B ke titik A pukul 8 lewat 10 detik (08:00:10 ) dengan kecepatan 3 m per detik. <br>
        Susun program untuk mencetak pada detik keberapa setelah pukul 8 Ali dan Badu berpapasan di jalan.<br>
        Juga mencetak jarak Badu dengan titik B setelah detik mereka berpapasan.
      </p>
    </div>

    <form method="post">
      <div class="form-group">
        <label for="jarakTempuh">Jarak Tempuh:</label>
        <input id="jarakTempuh" class="form-control" type="number" name="jarakTempuh" value="1000" required>
      </div>

      <div class="form-group">
        <label for="kecepatanAwal">Kecepatan Awal:</label>
        <input id="kecepatanAwal" class="form-control" type="number" name="kecepatanAwal" value="2.0" required>
      </div>

      <div class="form-group">
        <label for="kecepatanNaik">Kecepatan Naik :</label>
        <input id="kecepatanNaik" class="form-control" type="number" name="kecepatanNaik" value="0.1" required>
      </div>

      <div class="form-group">
        <label for="kecepatanBadu">Kecepatan Badu :</label>
        <input id="kecepatanBadu" class="form-control" type="number" name="kecepatanBadu" value="3.0" required>
      </div>

      <div class="form-group">
        <label for="selisihWaktu">Selisih Waktu :</label>
        <input id="selisihWaktu" class="form-control" type="number" name="selisihWaktu" value="10" required>
      </div>

      <button type="submit">Cetak Waktu</button>
    </form>

  </div>

  <div class="container">
    <h4>Hasil: <?php echo $hasil; ?> </h4>
  </div>

</body>

</html>
