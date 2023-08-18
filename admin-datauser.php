<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$namauser = "";
$namapenyakit = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $namauser = $_GET['namauser'];
    $sql1 = "delete from tb_data_diagnosa where nama_user = '$namauser'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil menghapus data user";
    } else {
        $error = "Gagal melakukan delete data user";
    }
}


if ($op == 'edit') {
    $namauser = $_GET['namauser'];
    $sql1 = "select * from tb_data_diagnosa where nama_user = '$namauser'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $namauser = $r1['nama_user'];
    $namapenyakit = $r1['hasil_diagnosa'];

    if ($namauser == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $namauser = $_POST['namauser'];
    $namapenyakit = $_POST['namapenyakit'];

    if ($namauser && $namapenyakit) {
        if ($op == 'edit') { //untuk update
            $sql1 = "update tb_data_diagnosa set nama_user='$namauser', hasil_diagnosa='$namapenyakit' where nama_user = '$namauser'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1 = "INSERT INTO tb_data_diagnosa(nama_user, hasil_diagnosa) VALUES ('$namauser','$namapenyakit')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }

    } else {
        $error = "Silahkan masukkan semua datanya";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diagnosa User</title>
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
                Edit Data Diagnosa User
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                    header("refresh:2;url=admin-datauser.php"); //2 detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                    header("refresh:2;url=admin-datauser.php"); //2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="namauser" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namauser" name="namauser"
                                    value="<?php echo $namauser ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namapenyakit" class="col-sm-2 col-form-label">Hasil Diagnosa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namapenyakit" name="namapenyakit"
                                    value="<?php echo $namapenyakit ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"> <span> <a
                                    href="admin-home.php"><button type="button" class="btn btn-success">Back to
                                        home</button></a></span>
                        </div>
                    </form>
            </div>
        </div>

        <!--Untuk mengeluarkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Diagnosa User
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama User</th>
                            <th scope="col">Hasil Diagnosa</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tb_data_diagnosa order by nama_user asc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $namauser = $r2['nama_user'];
                            $namapenyakit = $r2['hasil_diagnosa'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $namauser ?>
                                </th>
                                <td scope="row">
                                    <?php echo $namapenyakit ?>
                                </td>
                                <td scope="row">
                                    <a href="admin-datauser.php?op=edit&namauser=<?php echo $namauser ?>"><button
                                            type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin-datauser.php?op=delete&namauser=<?php echo $namauser ?>"
                                        onclick="return confirm('Anda yakin menghapus data diagnosa user?')"><button type="button"
                                            class="btn btn-danger">Delete</button></a>


                                </td>
                            </tr>
                            <?php

                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>