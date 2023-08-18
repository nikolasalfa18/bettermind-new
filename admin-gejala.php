<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$kodegejala = "";
$namagejala = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op=='delete'){
    $kodegejala = $_GET['kodegejala'];
    $sql1 = "delete from tb_pertanyaan where kode_pertanyaan = '$kodegejala'";
    $q1     = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus gejala";
    }else{
        $error = "Gagal melakukan delete gejala";
    }
}


if ($op == 'edit') {
    $kodegejala = $_GET['kodegejala'];
    $sql1 = "select * from tb_pertanyaan where kode_pertanyaan = '$kodegejala'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $kodegejala = $r1['kode_pertanyaan'];
    $namagejala = $r1['isi_pertanyaan'];

    if ($kodegejala == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $kodegejala = $_POST['kodegejala'];
    $namagejala = $_POST['namagejala'];

    if ($kodegejala && $namagejala) {
        if ($op == 'edit') {//untuk update
            $sql1 = "update tb_pertanyaan set kode_pertanyaan='$kodegejala', isi_pertanyaan='$namagejala' where kode_pertanyaan = '$kodegejala'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {//untuk insert
            $sql1 = "INSERT INTO tb_pertanyaan(kode_pertanyaan, isi_pertanyaan) VALUES ('$kodegejala','$namagejala')";
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
    <title>Data Gejala</title>
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
                Create / Edit Gejala
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                        header("refresh:2;url=admin-gejala.php");//2 detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                     header("refresh:2;url=admin-gejala.php");//2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="kodegejala" class="col-sm-2 col-form-label">Kode Gejala</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodegejala" name="kodegejala"
                                    value="<?php echo $kodegejala ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namagejala" class="col-sm-2 col-form-label">Gejala</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namagejala" name="namagejala"
                                    value="<?php echo $namagejala ?>">
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
                Data Gejala
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Gejala</th>
                            <th scope="col">Nama Gejala</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tb_pertanyaan order by kode_pertanyaan asc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $kodegejala = $r2['kode_pertanyaan'];
                            $namagejala = $r2['isi_pertanyaan'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $kodegejala ?>
                                </th>
                                <td scope="row">
                                    <?php echo $namagejala ?>
                                </td>
                                <td scope="row">
                                    <a href="admin-gejala.php?op=edit&kodegejala=<?php echo $kodegejala ?>"><button
                                            type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin-gejala.php?op=delete&kodegejala=<?php echo $kodegejala?>" onclick="return confirm('Anda yakin menghapus gejala?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                            

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