<!DOCTYPE html>
<html>

<head>
  <title>SPK | Prakerin</title>
  <style type="text/css">
    body {
      font-family: 'Times New Roman';
      background-color: #ccc;
    }

    .rangkalaporan {
      width: 826px;
      margin: 0 auto;
      background-color: #fff;
      height: 1169px;
      padding: 20px;
    }

    table {
      width: 100%;
      border-bottom: 5px solid #000;
      padding: 2px;
    }

    table.table1 {
      border: 1px solid black;
    }

    table.table1,
    tr,
    th,
    td {
      border: 1px;
      border-collapse: collapse;
    }

    table.table2,
    td,
    th {
      border: 1 solid black;
      border-collapse: collapse;
    }

    table.table2 {
      border-collapse: collapse;
    }

    table.table2,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
    }

    th {
      background-color: #4CAF50;
      color: whitesmoke;
    }

    table.table3,
    tr,
    td,
    th {
      border: 0px;
      border-collapse: collapse;
    }

    .tengah {
      text-align: center;
      line-height: 5px;
    }

    .left {
      text-align: left;
    }

    .right {
      text-align: right;
    }

    .center {
      text-align: center;
    }

    .justify {
      text-align: justify;
    }
  </style>
</head>

<body>
  <div class="rangkalaporan">
    <table widht="100%">
      <tr border="0px">
        <td><img src="<?= base_url('img/logo-smk.webp') ?>" alt="Logo SMK" srcset="Logo SMK"></td>
        <td class="tengah">
          <h2>Yayasan Walisongo Pecangaan</h2>
          <h1>SMK Walisongo Pecangaan</h1>
          <h2>Terakreditasi</h2>
          <h3>Jl. Kauman No. 1 Pecangaan Kec. Pecangaan Jepara Telp. (0291) 7510124</h3>
          <h4>Email : smkw9@yahoo.com, smkwalisongo.jepara@gmail.com, website : smkw9jepara.sch.id</h4>
        </td>
      </tr>
    </table>
    <h2 class="center">Rekomendasi Siswa untuk Penempatan Prakerin di DU/DI</h2>
    <h1 class="center"><?= $dudi->nm_dudi; ?></h1>
    <div class="center">
      <table class="table2">
        <thead>
          <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Nilai Preferensi</th>
            <th>Ranking</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($students->getNumRows() < 1) : ?>
            <tr>
              <td colspan="5" class="text-center"><strong>Data Kosong!</strong></td>
            </tr>
          <?php else : ?>
            <?php
            $no = 1;
            $rank = 1;
            ?>
            <?php foreach ($students->getResult() as $dt) : ?>
              <tr>
                <td><?= $no++; ?>.</td>
                <td><?= $dt->nis; ?></td>
                <td><?= $dt->name; ?></td>
                <td><?= number_format($dt->nilai_referensi, 8, ".", ""); ?></td>
                <td class="text-center"><?= $rank++; ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    </table><br><br>
    <table class="table3">
      <tbody>
        <tr>
          <td> </td>
          <td> </td>
          <td> </td>
          <td>
            <?php
            date_default_timezone_set("Asia/Jakarta");
            echo "Pecangaan, " . date("d-m-Y") . "</br>"; ?>
          </td>
        </tr>
        <tr>
          <td> </td>
          <td>Kepala Sekolah
            <br>
            <br>
            <br><br>
            Irbab Aulia Amri, S.Pd.,M.Pd.
          </td>
          <td> </td>
          <td>Waka Humas/Hubin
            <br>
            <br>
            <br><br>
            Dian Fahlevi, SE.,MM.
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>