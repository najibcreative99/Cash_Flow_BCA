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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
        .bg-gradient-primary {
            background-color: #005BAC; /* Biru gelap khas BCA */
            background-image: linear-gradient(180deg, #007bff 10%, #005BAC 100%);
            background-size: cover;
        }
        /* STYLE CARD PEMASUKAN */
        /* Default Sidebar State */
        .card-header {
    background: linear-gradient(to right, #005BAC, #007BC1);
    color: white;
    font-weight: bold;
    text-align: center;
    border-radius: 12px 12px 0 0;
    padding: 15px;
    font-size: 18px;
    letter-spacing: 0.5px;
}

/* Card Body */
.card-body {
    background-color: #F5F8FB;
    border: 1px solid #90CAF9;
    border-radius: 0 0 12px 12px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Label */
.card-body label {
    font-size: 14px;
    color: #005BAC;
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
}

/* Input dan Select */
.card-body .form-control {
    border-radius: 10px;
    border: 1px solid #64B5F6;
    padding: 5px;
    font-size: 14px;
    color: #005BAC;
    background-color: #FFFFFF;
    transition: all 0.3s ease;
}

.card-body .form-control:focus {
    border-color: #2196F3;
    box-shadow: 0 0 6px rgba(33, 150, 243, 0.3);
    outline: none;
}

/* Tombol */
.card-body .btn-primary {
    background: linear-gradient(to right, #007BC1, #005BAC);
    border: none;
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    color: white;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.card-body .btn-primary:hover {
    background: linear-gradient(to right, #005BAC, #004A8D);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

/* Tata Letak Responsif */
.card-body .row {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    gap: 15px;
}

.card-body .col-sm-4 {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.card-body .col-sm-4:first-child,
.card-body .col-sm-4:last-child {
    margin-right: 0;
}

/* Responsif untuk Mobile */
@media screen and (max-width: 768px) {
    .card-body .row {
        flex-direction: column;
        gap: 10px;
    }

    .card-body .col-sm-4 {
        width: 100%;
        margin-bottom: 10px;
    }

    .card-header {
        font-size: 16px;
    }

    .card-body .btn-primary {
        font-size: 14px;
    }
    
}


    
        
    </style>

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Manajemen Keuangan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
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
              <h6 class="m-0 font-weight-bold text-light">Input Pemasukan:</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">

              <form action='' name='kirim' method='post'>

              <div class="row">


                <div class="col-sm-4">
              <label>Nama Anggota:</label>
              <select class="form-control" name='nama' required>
              <option selected disabled value="">Nama Anggota</option>
                <?php
                 $brg=mysqli_query($conn, "select * from anggota");
                 while($b=mysqli_fetch_array($brg)){
                   ?>
                <option value="<?php echo $b['nama']; ?>"><?php echo $b['nama']; ?></option>

                   <?php } ?>
              </select>
              </div>


              <div class="col-sm-4">
              <label>Input Nominal:</label>
        <input class="form-control form-control-sm" type="number" placeholder="Jumlah Uang..." aria-label=".form-control-sm example" name='jumlah' required>
              </div>

              <div class="col-sm-4">
              <label>Tanggal Setor:</label>
              <input class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" name='date' required>
              </div>


              </div>


              <button type="submit" class="btn btn-primary btn-lg btn-block mt-4" name='kirim'>Kirim</button>

              </form>
              <?php



                if(isset($_POST['kirim'])){
               $nama = htmlspecialchars($_POST['nama']);
               $jumlah = htmlspecialchars($_POST['jumlah']);
               $date = htmlspecialchars($_POST['date']);


               $insert = mysqli_query($conn, "INSERT INTO kas VALUES (
                NULL,
                '$nama',
                '$jumlah',
                '$date'
                  )");

               if($insert){
                 echo "<div class='col-md-10 col-sm-12 col-xs-12'>";
                 echo "<div class='alert alert-success mt-4 ml-5' role='alert'>";
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
