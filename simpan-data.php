<?php session_start();?>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$namauser = $_SESSION['nama'];
$namapenyakit = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) { //untuk create
    $namauser = $_SESSION['nama'];
    $namapenyakit = $_POST['namapenyakit'];
    if ($namauser && $namapenyakit) {
            $sql1 = "INSERT INTO tb_data_diagnosa(nama_user, hasil_diagnosa) VALUES ('$namauser','$namapenyakit')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }

    } else {
        $error = "Silahkan masukkan hasil diagnosa anda";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyakit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!--Untuk memasukan data-->
        <div class="card">
            <div class="card-header">
                Simpan Data Diagnosa
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                    
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                    header("refresh:2;url=index.php"); //2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="namauser" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namauser" name="namauser"
                                    value="<?php echo $namauser ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namapenyakit" class="col-sm-2 col-form-label">Penyakit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namapenyakit" name="namapenyakit"
                                    value="<?php echo $namapenyakit ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="simpan" value="Simpan Data Diagnosa" class="btn btn-primary"> <span> <a
                                    href="Index.php"><button type="button" class="btn btn-success">Batal</button></a></span>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>

</html>