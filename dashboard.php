<?php
session_start();

if($_SESSION['password']=='')
{
    header("location: login.php");
}
include 'config/koneksi.php';


  $Jumlah_kas=mysqli_query($conn, "select sum(jumlah) as kas from kas");
  $total=mysqli_fetch_array($Jumlah_kas);


    $Jumlah_out=mysqli_query($conn, "select sum(jumlah) as keluar from keluar");
    $total_out=mysqli_fetch_array($Jumlah_out);


    $jumlah_anggota=mysqli_query($conn,"SELECT COUNT(*) as id from anggota");
    $row = mysqli_fetch_array($jumlah_anggota);
    $jum_anggota = $row['id'];


        $jumlah_keluar=mysqli_query($conn,"SELECT COUNT(*) as id from keluar");
        $row = mysqli_fetch_array($jumlah_keluar);
        $jum_keluar = $row['id'];


 ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard BCA Mobile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #005BAC; /* Latar belakang biru BCA */
            color: white;
            font-family: 'Arial', sans-serif;
            padding-bottom: 70px; /* Ruang untuk footer */
        }
        .container {
            margin-top: 20px;
            padding: 0 20px; /* Ruang di samping */
        }
        .navbar {
            background-color: #fff; /* Warna navbar putih */
            padding: 10px 15px; /* Tambahkan padding atas dan bawah */
            height: 70px; /* Tinggi navbar yang proporsional */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan bawah */
            display: flex;
            align-items: center;
            margin-bottom: 1px; /* Tambahkan jarak ke bawah */
        }


        .logo-bca {
            width: 100px; /* Tetap ramping */
            margin-right: 10px; /* Jarak horizontal tetap */
            margin-top: -25px; /* Geser sedikit ke atas */
        }
        .navbar-icons i {
            vertical-align: middle;
            margin-top: -25px; /* Geser sedikit ke atas */
        }

        .network-strength {
            width: 80px; /* Lebar tetap */
            height: 5px; /* Tinggi tetap */
            background: linear-gradient(to right, #4caf50 70%, #ccc 30%);
            border-radius: 5px;
            margin-left: 10px; /* Jarak horizontal tetap */
            margin-top: -25px; /* Geser sedikit ke atas */
        }
        .card {
            background: linear-gradient(135deg, #00A3E0 0%, #0072B1 100%); /* Gradasi biru yang lebih cerah khas BCA */
            border: none;
            border-radius: 15px;
            transition: transform 0.2s; /* Efek hover */
            height: 120px; /* Tinggi kartu */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan ringan */
        }

        .card:hover {
            transform: scale(1.05); /* Membesar saat hover */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* Bayangan lebih dalam saat hover */
        }

        .card-icon {
            font-size: 40px; /* Ukuran ikon */
            color: white; /* Warna ikon tetap putih */
        }

        .card-title {
            font-size: 14px; /* Ukuran teks judul */
            font-weight: bold;
            margin-top: 10px; /* Jarak atas */
            color: white; /* Warna teks tetap putih */
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #003d80; /* Warna footer */
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3); /* Bayangan untuk footer */
        }
        .btn-detail {
            background: linear-gradient(135deg, #00A3E0 0%, #0072B1 100%); /* Warna tombol */
            border: none;
            color: white;
            margin-top: 5px;
            width: 100%;
            height: 50px;
            border-radius: 25px; /* Tombol bulat */
            font-size: 18px; /* Ukuran teks tombol */
            transition: background-color 0.3s;
        }
        .btn-detail:hover {
            background-color: #005BAC; /* Warna tombol saat hover */
        }
        .dashboard-title {
        font-size: 20px; /* Ukuran ideal untuk tampilan layar */
        font-family: 'Helvetica Neue', Arial, sans-serif; /* Font modern yang mirip dengan BCA Mobile */
        font-weight: 700; /* Tebal untuk memberikan kesan premium */
        color: #ffffff; /* Warna teks putih */
        letter-spacing: 0.8px; /* Sedikit jarak antar huruf */
        text-shadow: 1px 2px 5px rgba(0, 0, 0, 0.6); /* Bayangan teks untuk tampilan profesional */
        margin: 0 auto; /* Tengah rapi */
        width: fit-content; /* Menyesuaikan lebar sesuai teks */
        background: linear-gradient(90deg, #003D80 0%, #0078D7 50%, #003DA5 100%); /* Gradasi biru khas BCA */
        padding: 10px 30px; /* Spasi di sekitar teks */
        border-radius: 30px; /* Membuat sudut membulat */
        border: 2px solid rgba(255, 255, 255, 0.5); /* Border putih transparan */
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4); /* Efek bayangan untuk dimensi */
        animation: pulse 2s infinite; /* Efek animasi lembut */
        text-align: center;
    }

/* Efek animasi lembut */
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.4);
    }
    50% {
        transform: scale(1.02); /* Sedikit membesar */
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.6); /* Bayangan lebih dalam */
    }
}



    </style>
</head>
<body>
    <nav class="navbar">
        <div class="d-flex justify-content-between align-items-center w-100">
        <img src="img/bca.png" alt="Logo BCA" class="logo-bca"> <!-- Logo BCA -->
        <div class="navbar-icons d-flex align-items-center">
            <div class="network-strength"></div> <!-- Indikator kekuatan jaringan -->
            <i class="fas fa-sign-out-alt" style="font-size: 18px; color: #003DA5; margin-left: 10px;"></i> <!-- Ikon keluar -->
        </div>
    </div>

    </nav>


    <div class="container">
    <h1 class="dashboard-title text-center mb-4">BCA Mobile Cash Management Academy Smk Krian 1 Sidoarjo</h1>
    <div class="row text-center">
        <div class="col-md-3 col-6 mb-3">
            <a href="tambah_anggota.php" class="card-link">
                <div class="card p-3">
                    <i class="fas fa-users card-icon"></i>
                    <div class="card-title">Manajemen Anggota</div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <a href="setor.php" class="card-link">
                <div class="card p-3">
                    <i class="fas fa-money-bill-wave card-icon"></i>
                    <div class="card-title">Manajemen Uang</div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <a href="daftar_out.php" class="card-link">
                <div class="card p-3">
                    <i class="fas fa-exchange-alt card-icon"></i>
                    <div class="card-title">Mutasi Rekening</div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <a href="index.php" class="card-link">
                <div class="card p-3">
                    <i class="fas fa-wallet card-icon"></i>
                    <div class="card-title">Info Saldo</div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <a href="index.php" class="card-link">
                <div class="card p-3" style="position: relative; background-color: white; color: #007bff; border: 2px solid #007bff; border-radius: 15px; display: flex; align-items: center; justify-content: center; flex-direction: column; height: 120px;">
                    <i class="fas fa-credit-card card-icon" style="font-size: 42px;"></i>
                    <i class="fas fa-bolt" style="font-size: 24px; color: gold; position: absolute; left: 100px; top: 10px;"></i>
                    <div class="card-title" style="margin-top: 7px;">Flazz</div>
                </div>
            </a>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <a href="https://lms.bcateachingfactory.com/" class="card-link">
                <div class="card p-3">
                    <i class="fas fa-chalkboard-teacher card-icon"></i>
                    <div class="card-title">LMS BCA</div>
                </div>
            </a>
        </div>
    </div>
        <button class="btn btn-detail" data-toggle="modal" data-target="#kartuModal">
            <i class="fas fa-money-check-alt" style="margin-right: 5px;"></i> Lihat Detail Kartu
        </button>
    </div>

    <!-- Modal untuk menampilkan kartu.html -->
    <div class="modal fade" id="kartuModal" tabindex="-1" aria-labelledby="kartuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kartuModalLabel">Detail Kartu BCA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="kartu.html" style="border:none; width: 100%; height: 400px;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 BCA. All rights reserved.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
