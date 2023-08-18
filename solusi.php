<?php session_start();?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Bettermind</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>


<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="m-0">Bettermind</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>   
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header">
                <div class="container my-5 py-5 px-lg-5">
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        

        <!-- Kesimpulan Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Diagnosa<span></span></p>
                <h1 class="text-center mb-5">
                
                <form method="post" action="solusi.php" enctype="multipart/form-data" role="form">

                <?php
                include ('koneksi.php');
                //$kode='D1';
                
                echo "<p>Nama : ".$_SESSION['nama']."</p>";
                echo "<p>Umur : ".$_SESSION['umur']."</p>";
                    
                    if(isset($_GET['kode'])){
                        $kode=$_GET['kode'];
                    }   
                ?>
                <hr>
                <p>Kemu Merasakan :</p>
                <?php
                 include "fungsi.php";
                 solusi($kode);  
                ?>
                

                <hr>
                <?php
                $sql = "SELECT * from tb_solusi WHERE kode_solusi='$kode'";
                $data = mysqli_query($connect,$sql);
                $row = mysqli_fetch_assoc($data);
                if ($row['kode_solusi']=="X") {
                     echo "<center><p><strong style='color:black'>Kami belum bisa memastikan diagnosa awal dari gejala yang anda rasakan</strong></p></center><hr>";
                     ?>

                     <!------------------------MASUKAN KEPADA SISTEM -------------------------------->
                        <div class="card bg-dark">
                             <h5 class="card-header">Pengguna menambah fakta baru</h5>
                            <div class="card-body">
                             <form action="solusi.php" method="post">
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Diagnosa :</label>
                                <select name="solusi" class="form-control" id="exampleFormControlSelect2">
                                <?php 
                                include "koneksi.php";
                                $sql = "SELECT * from tb_solusi";
                                $data = mysqli_query($connect,$sql);
                                while ($row = mysqli_fetch_assoc($data)) {
                                   if ($row['isi_solusi']!="X") {
                                    echo '<option value="'.$row["isi_solusi"].'">'.$row["isi_solusi"].'</option>';
                                 }
                                }
                                ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput2">Masukan gejala:</label>
                                <input type="text" name="fakta" class="form-control" id="exampleFormControlInput1" placeholder="contoh : Suka melamun">
                              </div>
                              <input type="submit" class="btn btn-info" name="masukan">
                            </form>    
                            </div> 
                        </div>  
                        <!------------------------MASUKAN KEPADA SISTEM -------------------------------->                      
                     <?php 
                }
                
                else{
                    echo "<p>Diagnosa awal dari gejala yang kamu rasakan adalah : <strong style='color:green'>".$row['isi_solusi']."</strong></p>";
                }
                
                ?>
            </form>
            </div>
        </div>
        <!-- Question End -->
        



        
        <div class="print">
                <button onclick="window.print()" class="btn btn-primary align-items-center">Print</button>     
        </div>
        <a href="simpan-data.php"><button type="button" class="btn btn-success">Simpan Data</button></a>

        <a href="index.php"><button type="button" class="btn btn-success">Back to home</button></a>

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Bettermind</a>, All Right Reserved. 
							
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="index.php">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

   

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>

<?php
include "koneksi.php";
if (!empty($_POST['masukan'])){
$fakta= $_POST['fakta'];
$solusi=$_POST['solusi'];
$oleh=$_SESSION['nama'];
$status="menunggu";

$sql1 = "INSERT INTO tb_kesimpulan (solusi, fakta, oleh, status) VALUES ('$solusi', '$fakta', '$oleh', '$status')";
if (mysqli_query($connect,$sql1)){
    echo "<script>alert('Saran berhasil dimasukan, harus menunggu moderasi!'); window.location=('hapus-session.php');</script>";
//echo "<script type='text/javascript'>window.location.replace('pakar-mode.php');</script>";
  }
  else  echo "<script>alert('gagal');</script>";
}

?>