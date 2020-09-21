<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembayaran Registrasi</title>
</head>
<body>
    <table>
        <tr style="padding-top: 30px">
            <td rowspan="3"><img src="{{ public_path('img/unnur.jpg') }}" width="80" height="80" alt=""></td>
            <td colspan="2" style="text-align: center; padding-top: 1px;"><b>Universitas Nurtanio Bandung</b></td>
        </tr>
        <tr>
        <td colspan="2" style="text-align: center;">{{ $data_pendaftar->nama_fakultas }}</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">Jln.Pajajaran No.219 Lanud Husein S.Bandung 40174 Telp.022 86061700/Fax 86061701</td>
        </tr>
    </table>
    <hr>
    <center><u>Bukti Pembayaran Registrasi</u></center>
    <p style="text-align: right;padding-bottom: -50px">Tanggal : {{ date("Y-m-d") }}</p>
    <table> 
        <tr>
            <td  style="text-align: left;"></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $data_pendaftar->nik }}</td>
            <td style="padding-right: 50px; padding-left: 50px;">Gelombang</td>
            <td>:</td>
            <td>{{ $data_pendaftar->gelombang }}</td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $data_pendaftar->nama }}</td>
            <td style="padding-right: 50px; padding-left: 50px;">Tahun</td>
            <td>:</td>
            <td>{{ $data_pendaftar->tahun }}</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td>{{ $data_pendaftar->nama_fakultas }}</td>
            <td style="padding-right: 50px; padding-left: 50px;">Metode Pembayaran</td>
            <td>:</td>
            <td>{{ $data_pendaftar->metode_pembayaran }}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td>{{ $data_pendaftar->nama_prodi }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="padding-top: 10px">Rincian Pembayaran :</td>
        </tr>
        <tr>
            <td>1. Biaya Registrasi Awal</td>
            <td style="padding-left: 50px">Rp.{{ $data_pendaftar->biaya_registrasi }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="padding-left:315px; padding-top: 10px; text-align: center;">Penerima</td>
            <td style="padding-left:165px; padding-top: 10px; text-align: center;">Bandung,{{ date("Y-m-d") }}</td>
        </tr>
        <tr>
            <td style="padding-left:315px;padding-top: 56px; text-align: center;">({{ $nama_op }})</td>
            <td style="padding-left:165px;padding-top: 56px; text-align: center;">({{ $data_pendaftar->nama }})</td>
        </tr>
    </table>
</body>
</html>