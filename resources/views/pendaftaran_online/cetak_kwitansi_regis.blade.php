<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kwitansi Pembayaran Registrasi</title>
</head>
<body>
    <table>
        <tr>
            <td rowspan="3"><img src="{{ public_path('img/unnur.jpg') }}" width="80" height="80" alt=""></td>
            <td colspan="2" style="text-align: center; padding-top: 15px;"><b>Universitas Nurtanio Bandung</b></td>
        </tr>
        <tr>
        <td colspan="2" style="text-align: center;">{{ $data_pendaftar->nama_fakultas }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Jln.Pajajaran No.219 Lanud Husein S.Bandung 40174 Telp.022 86061700/Fax 86061701</td>
        </tr>
    </table>
    <hr>
    <center>Kwitansi Pembayaran Registrasi</center>
    <br>
    <table> 
        <tr>
            <td colspan="3" style="text-align: center">Data Calon Mahasiswa</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data_pendaftar->nik }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>No Telephone</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr><td>    </td></tr>
        <tr>
            <td colspan="3" style="text-align: center">Data Fakultas</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Jenjang Pendidikan</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Biaya Pendaftaran</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td>:</td>
            <td>[field_table]</td>
        </tr>
    </table>
</body>
</html>