<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to bottom, #005BAC, #007BC1);
      font-family: 'Nunito', sans-serif;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 2rem;
    }

    .text-gray-900 {
      color: #003C77 !important;
      font-weight: bold;
    }

    .form-control-user {
      border-radius: 10px;
      border: 1px solid #64B5F6;
      padding: 10px 15px;
      font-size: 16px;
      color: #003C77;
    }

    .form-control-user:focus {
      box-shadow: 0 0 5px #64B5F6;
      border-color: #64B5F6;
    }

    .btn-user {
      border-radius: 10px;
      background: linear-gradient(to right, #005BAC, #007BC1);
      color: white;
      font-size: 16px;
      font-weight: bold;
    }

    .btn-user:hover {
      background: linear-gradient(to right, #004A8D, #005BAC);
    }

    .alert {
      font-size: 14px;
      font-weight: bold;
      text-align: center;
    }

    .logo {
  width: 150px; /* Ukuran logo */
  margin-bottom: -20px; /* Mengurangi jarak antara logo dan elemen berikutnya */
  margin-top: -50px; /* Membawa logo lebih ke atas */
  display: block; /* Pastikan logo tampil sebagai elemen blok */
  margin-left: auto; 
  margin-right: auto; /* Memastikan logo berada di tengah */
}

.buttons-container {
  margin-top: -40px; /* Jarak antara container utama dan tombol */
}

.custom-button {
  width: 200px; /* Lebar tombol */
  padding: 10px; /* Padding tombol */
  margin: 10px; /* Jarak antar tombol */
  font-size: 16px; /* Ukuran font */
  color: white; /* Warna teks */
  background: linear-gradient(to right, #005BAC, #007BC1); /* Warna gradasi tombol */
  border: none; /* Hapus border */
  border-radius: 8px; /* Sudut membulat */
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2); /* Bayangan untuk efek 3D */
  transition: all 0.3s ease-in-out; /* Animasi pada hover */
}

.custom-button:hover {
  background: linear-gradient(to right, #004A8D, #005BAC); /* Warna saat hover */
  transform: scale(1.05); /* Sedikit pembesaran saat hover */
}

@media (max-width: 768px) {
  .custom-button {
    width: 90%; /* Tombol lebih lebar di layar kecil */
  }
}


    
  </style>

</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/bca.png" alt="BCA Logo" class="logo"> <!-- Logo added here -->
                    <h1 class="h4 text-gray-900 mb-1">Welcome BCA Mobile Cash Management Smk Krian 1 Sidoarjo</h1>
                    <p class="text-gray-900 mb-4">Silakan masukkan username dan password Anda untuk melanjutkan.</p>
                  </div>
                  <form action="login_proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
  <input type="text" name="kode_akses" class="form-control form-control-user" id="exampleInputAccessCode" placeholder="Kode Akses">
</div>

                    <button class="btn btn-primary btn-user btn-block" name="pesan">Login</button>
                    <hr>
                  </form>
                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
            <div class="buttons-container text-center">
             
  <button class="btn custom-button">Buat Rekening Baru</button>
  <button class="btn custom-button">Info BCA</button>
</div>
            


            <?php
            if (isset($_GET['pesan'])) {
              $pesan = addslashes($_GET['pesan']);
              if ($pesan == "gagal") {
                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                echo "<p><center>Gagal Masuk Sebagai Admin</center></p>";
                echo "</div>";
                echo "</div>";
              } elseif ($pesan === "password") {
                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                echo "<p><center>Sukses Mengganti Password</center></p>";
                echo "</div>";
                echo "</div>";
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
