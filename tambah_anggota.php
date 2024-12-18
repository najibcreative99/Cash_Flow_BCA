<?php
session_start();

if($_SESSION['password']=='')
{
    header("location: login.php");
}
include 'config/koneksi.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/favicon.png" type="image/gif" sizes="16x16">

  <title>Menejemen Keuangan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style>
        .bg-gradient-primary {
            background-color: #005BAC; /* Biru gelap khas BCA */
            background-image: linear-gradient(180deg, #007bff 10%, #005BAC 100%);
            background-size: cover;
        }
        .btn-custom-back {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(90deg, #007ACC, #0168AA);
        color: white;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 20px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 14px;
        margin-left: 80px;
      }

      .btn-custom-back i {
        margin-right: 8px;
        font-size: 18px;
      }

      .btn-custom-back:hover {
        background: linear-gradient(90deg, #005B99, #014F87);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      }
      
      .card {
  background: linear-gradient(135deg, #007ACC, #005B99); /* Gradasi biru BCA */
  border: none;
  border-radius: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
  overflow: hidden;
  position: relative;
  transition: all 0.3s ease;
}

.card .card-body {
  padding: 25px;
  color: white;
  position: relative;
  z-index: 2;
}

.card .text-xs {
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.8);
  margin-bottom: 10px;
}

.card .h5 {
  font-size: 28px;
  font-weight: bold;
  margin: 0;
  color: #FFFFFF;
}

.card .col-auto i {
  color: rgba(255, 255, 255, 0.9);
  filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.5));
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.card.border-left-primary {
  background: linear-gradient(135deg, #005BBF, #004BA0); /* Biru untuk total saldo */
}

.card.border-left-success {
  background: linear-gradient(135deg, #28A745, #218838); /* Hijau untuk pengeluaran */
}

.card.border-left-info {
  background: linear-gradient(135deg, #17A2B8, #138496); /* Biru muda untuk anggota */
}

.card.border-left-warning {
  background: linear-gradient(135deg, #FFC107, #E0A800); /* Kuning untuk jumlah pengeluaran */
}

/* Submenu Styling */
.collapse-inner {
    padding: 0;
    margin: 0;
}

.collapse-inner .collapse-item {
    display: block;
    padding: 12px 20px; /* Padding khas BCA */
    font-size: 14px;
    font-weight: 500;
    color: #005BAC; /* Warna biru khas BCA */
    text-decoration: none;
    transition: all 0.3s ease;
}

/* Hover Effect */
.collapse-inner .collapse-item:hover {
    background-color: #E3F2FD; /* Biru muda khas BCA */
    color: #003C77; /* Biru lebih gelap */
    border-radius: 4px;
}

/* Collapse Animation */
.collapse {
    transition: height 0.3s ease-out, opacity 0.3s ease;
    overflow: hidden;
}

/* Responsiveness */
@media screen and (max-width: 768px) {
    .nav-item {
        width: 100%;
    }

    .collapse-inner .collapse-item {
        text-align: left;
        padding: 10px;
    }
}


        
    </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/bca mobile.png" alt="BCA Mobile Logo" style="width: 40px; height: 40px;"> <!-- Sesuaikan ukuran sesuai kebutuhan -->
        </div>
        <div class="sidebar-brand-text mx-3">BCA MOBILE <br> MANAGEMENT</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen Anggota
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Manajemen Anggota</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="tambah_anggota.php">Tambah Anggota</a>
            <a class="collapse-item" href="daftar_anggota.php">Daftar Anggota</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen Keuangan
      </div>


      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-folder"></i>
    <span>Manajemen Keuangan</span>
  </a>
  <div id="collapseUtilities" class="collapse">
    <div class="bg-white collapse-inner rounded">
      <a class="collapse-item" href="setor.php">Input Pemasukan</a>
      <a class="collapse-item" href="daftar_kas.php">Daftar Pemasukan</a>
      <a class="collapse-item" href="catat_out.php">Input Pengeluaran</a>
      <a class="collapse-item" href="daftar_out.php">Daftar Pengeluaran</a>
    </div>
  </div>
</li>





      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <?php
          $pass = $_SESSION['password'];
          $sss = mysqli_query($conn, "select * from admin where password = '$pass'");
          $rrr = mysqli_fetch_array($sss);
          if($sss){
             ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $rrr['nama']; ?></span>
                <img class="img-profile rounded-circle" src="img/<?php echo $rrr['foto']; ?>" alt="profile">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Riwayat
                </a>
                <a class="dropdown-item" href="pengaturan.php?id=<?php echo $rrr['id']; ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <a class="dropdown-item" href="change.php?id=<?php echo $rrr['id']; ?>">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            <?php
}
             ?>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Tambah Anggota:</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">

              <form action='' name='kirim' method='post'>

              <div class="row">


                <div class="col-sm-4">
              <label>Nama Anggota:</label>
              <input class="form-control form-control-sm" type="text" placeholder="Nama Anggota..." aria-label=".form-control-sm example" name='nama' required>
              </div>


              <div class="col-sm-4">
              <label>Alamat:</label>
        <input class="form-control form-control-sm" type="text" placeholder="Alamat..." aria-label=".form-control-sm example" name='alamat' required>
              </div>

              <div class="col-sm-4">
              <label>Tanggal Lahir:</label>
              <input class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" name='date' required>
              </div>


              </div>


              <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" name='kirim'>Kirim</button>

              </form>
              <?php



                if(isset($_POST['kirim'])){
               $nama = htmlspecialchars($_POST['nama']);
               $alamat = htmlspecialchars($_POST['alamat']);
               $date = htmlspecialchars($_POST['date']);




                  $wet =mysqli_query($conn, "select * from anggota where nama ='$nama'");
                  $chak = mysqli_num_rows($wet);
                  if($chak > 0){

                    $rew = mysqli_fetch_array($wet);

                    $nama  === $rew['nama'];
                    $alamat  === $rew['alamat'];


                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                    echo "<div class='alert alert-warning mt-4 ml-5' role='alert'>";
                    echo "<p><center>Data Yang Anda Kirim Sudah Tersedia</center></p>";
                    echo   "</div>";
                    echo "</div>";


                  }else{

               $insert = mysqli_query($conn, "INSERT INTO anggota VALUES (
                NULL,
                '$nama',
                '$alamat',
                '$date'
                  )");

               if($insert){
                 echo "<div class='col-md-10 col-sm-12 col-xs-12'>";
                 echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                 echo "<p><center>Data Sudah Masuk</center></p>";
                 echo   "</div>";
                 echo "</div>";
               }else{
                 echo "<div class='col-md-10 col-sm-12 col-xs-12'>";
                 echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                 echo "<p><center>Data Gagal Masuk</center></p>";
                 echo   "</div>";
                 echo "</div>";

               }


            }
                }


              ?>


</div>
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Option "Logout" Untuk Keluar Dan Pilih Option "Cancel" Untuk Membatalkan</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
