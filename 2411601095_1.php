<?php

function funcMendahului($jarakTempuh, $kecepatanAwal, $kecepatanNaik, $kecepatanBadu, $selisihWaktu)
{
  $kecepatanAli = $kecepatanAwal;
  $waktuAli = 0;
  $posisiAli = 0;
  $waktuBadu = $selisihWaktu;
  $posisiBadu = 0;

  while ($posisiBadu <= $posisiAli) {
    for ($i = 0; $i < 10; $i++) {
      if ($posisiAli >= $jarakTempuh)
        break;
      $posisiAli += $kecepatanAli;
      $waktuAli++;
    }
    $kecepatanAli += $kecepatanNaik;

    for ($i = 0; $i < 10; $i++) {
      if ($posisiBadu >= $jarakTempuh)
        break;
      $posisiBadu += $kecepatanBadu;
      $waktuBadu++;

      if ($posisiBadu > $posisiAli) {
        return sprintf("%02d:%02d:%02d", floor($waktuBadu / 3600) + 8, floor(($waktuBadu % 3600) / 60), $waktuBadu % 60);
      }
    }
  }
  return "Tidak terkejar";
}

$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jarakTempuh = (int) $_POST['jarakTempuh'];
  $kecepatanAwal = $_POST['kecepatanAwal'];
  $kecepatanNaik = $_POST['kecepatanNaik'];
  $kecepatanBadu = $_POST['kecepatanBadu'];
  $selisihWaktu = (int) $_POST['selisihWaktu'];

  $hasil = funcMendahului($jarakTempuh, $kecepatanAwal, $kecepatanNaik, $kecepatanBadu, $selisihWaktu);
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
    <p><b>Ini adalah UAS - Soal 1</b></p>

    <div class="form-group">
      <div>
        Jarak titik A dan titik B: 1000 m<br>
        Ali berangkat dari titik A ke titik B pukul 08:00:00 dengan kecepatan sebagai berikut:
        <li>10 detik pertama kecepatannya 2 m per detik.</li>
        <li>10 detik berikutnya kecepatan naik menjadi 2.1 m per detik.</li>
      </div>
      <p>
        Demikian seterusnya, setiap 10 detik berikutnya kecepatannya bertambah dengan 0.1 m per detik.<br>
        Satu menit kemudian , yaitu pukul 08: 01 : 00, Badu berangkat juga dari titik A ke titik B, menysul Ali dengan
        kecepatan tetap , 3 m per detik.<br>
        Susun program untuk mencetak pukul berapa ( Jam : Menit : Detik ) Badu dapat mendahului Ali.
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
        <input id="selisihWaktu" class="form-control" type="number" name="selisihWaktu" value="60" required>
      </div>

      <button type="submit">Cetak Waktu</button>
    </form>

  </div>

  <div class="container">
    <h4>Hasil: <?php echo $hasil; ?> </h4>
  </div>

</body>

</html>
