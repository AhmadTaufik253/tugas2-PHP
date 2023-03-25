<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tugas2.css">
    <title>Tugas Pemrosesan Form</title>
</head>
<body>
    <form method="POST" action="">
        <table id="input">
            <tr>
                <th colspan="2">Masukan Data</th>
            </tr>
            <tr>
                <td><label for="">Nama</label></td>
                <td><input type="text" name="nama" placeholder="Masukan nama" required></td>
            </tr>
            <tr>
                <td><label for="">Matakuliah</label></td>
                <td><select name="jabatan" id="">
                    <option value="">---Pilih Jabatan---</option>
                    <option value="Manager">Manager</option>
                    <option value="Asisten">Asisten</option>
                    <option value="Kabag">Kabag</option>
                    <option value="Staff">Staff</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="">Agama</label></td>
                <td><select name="agama" id="">
                    <option value="">---Pilih Agama---</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="">Status Pernikahan</label></td>
                <td><select name="statnikah" id="">
            <option value="">---Pilih Status---</option>
            <option value="Menikah">Menikah</option>
            <option value="Belum Menikah">Belum Menikah</option>
        </select></td>
            </tr>
            <tr>
                <td><label for="">Anak</label></td>
                <td><input type="number" name="anak" placeholder="Masukan jumlah anak" max=5></td>
            </tr>
            <tr class="btn">
                <td colspan="2" align="center"><button type="submit" name="proses">Simpan</button></td>
            </tr>
        </table>
    </form>

    <?php
    error_reporting(0);
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $agama = $_POST['agama'];
    $statNikah = $_POST['statnikah'];
    $anak = $_POST['anak'];
    $tombol = $_POST['proses'];

    switch ($jabatan) {
        case "Manager": $gajiPokok = 20;  break;
        case "Asisten": $gajiPokok = 15;  break;
        case "Kabag": $gajiPokok = 10;  break;
        case "Staff": $gajiPokok = 4;  break;
        default: $gajiPokok = ""; break;
    }

    $tunjanganJataban = 0.2 * $gajiPokok;

    if($statNikah === "Menikah"){
        if($anak <= 2){
            $tunjanganKeluarga = 0.05 * $gajiPokok;
        } 
        if($anak > 2 && $anak <= 5){
            $tunjanganKeluarga = 0.1 * $gajiPokok;
        }
    } else {
        $tunjanganKeluarga = 0;
    }

    $gajiKotor = $gajiPokok + $tunjanganJataban + $tunjanganKeluarga;
    
    $zakatProfesi = ($agama === "Islam" && $gajiKotor >= 6) ? 0.025 * $gajiKotor  : 0;

    $takeHomePay = $gajiKotor - $zakatProfesi;

    if(isset($tombol))
    ?>

    <table id="tampil">
        <tr>
            <th colspan="2">Detail Data</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><?= $jabatan ?> </td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td><?= $gajiPokok ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><?= $agama ?></td>
        </tr>
        <tr>
            <td>Tunjangan Jabatan</td>
            <td><?= $tunjanganJataban ?></td>
        </tr>
        <tr>
            <td>Status Pernikahan</td>
            <td><?= $statNikah ?></td>
        </tr>
        <tr>
            <td>Jumlah Anak</td>
            <td><?= $anak ?></td>
        </tr>
        <tr>
            <td>Tunjangan Keluarga</td>
            <td><?= $tunjanganKeluarga ?></td>
        </tr>
        <tr>
            <td>Gaji Kotor</td>
            <td><?= $gajiKotor ?></td>
        </tr>
        <tr>
            <td>Zakat Profesi</td>
            <td><?= $zakatProfesi ?></td>
        </tr>
        <tr>
            <td>Take Home Pay</td>
            <td><?= $takeHomePay ?></td>
        </tr>
    </table>
    
</body>
</html>

