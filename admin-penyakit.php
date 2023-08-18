<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$kodesolusi = "";
$namapenyakit = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op=='delete'){
    $kodesolusi = $_GET['kodesolusi'];
    $sql1 = "delete from tb_solusi where kode_solusi = '$kodesolusi'";
    $q1     = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus penyakit";
    }else{
        $error = "Gagal melakukan delete penyakit";
    }
}


if ($op == 'edit') {
    $kodesolusi = $_GET['kodesolusi'];
    $sql1 = "select * from tb_solusi where kode_solusi = '$kodesolusi'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $kodesolusi = $r1['kode_solusi'];
    $namapenyakit = $r1['isi_solusi'];

    if ($kodesolusi == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $kodesolusi = $_POST['kodesolusi'];
    $namapenyakit = $_POST['namapenyakit'];

    if ($kodesolusi && $namapenyakit) {
        if ($op == 'edit') {//untuk update
            $sql1 = "update tb_solusi set kode_solusi='$kodesolusi', isi_solusi='$namapenyakit' where kode_solusi = '$kodesolusi'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {//untuk insert
            $sql1 = "INSERT INTO tb_solusi(kode_solusi, isi_solusi) VALUES ('$kodesolusi','$namapenyakit')";
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
                Create / Edit Penyakit
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                        header("refresh:2;url=admin-penyakit.php");//2 detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                     header("refresh:2;url=admin-penyakit.php");//2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="kodesolusi" class="col-sm-2 col-form-label">Kode Penyakit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodesolusi" name="kodesolusi"
                                    value="<?php echo $kodesolusi ?>">
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
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"> <span> <a href="admin-home.php"><button type="button" class="btn btn-success">Back to home</button></a></span>
                        </div>
                    </form>
            </div>
        </div>

        <!--Untuk mengeluarkan data-->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Penyakit
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Penyakit</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tb_solusi order by kode_solusi asc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $kodesolusi = $r2['kode_solusi'];
                            $namapenyakit = $r2['isi_solusi'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $kodesolusi ?>
                                </th>
                                <td scope="row">
                                    <?php echo $namapenyakit ?>
                                </td>
                                <td scope="row">
                                    <a href="admin-penyakit.php?op=edit&kodesolusi=<?php echo $kodesolusi ?>"><button
                                            type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin-penyakit.php?op=delete&kodesolusi=<?php echo $kodesolusi?>" onclick="return confirm('Anda yakin menghapus penyakit?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                            

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