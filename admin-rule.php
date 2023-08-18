<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$koderule = "";
$pertanyaan = "";
$ya = "";
$tidak = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op=='delete'){
    $koderule = $_GET['koderule'];
    $sql1 = "delete from tb_rules where kode_rule = '$koderule'";
    $q1     = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus rule";
    }else{
        $error = "Gagal melakukan delete rule";
    }
}


if ($op == 'edit') {
    $koderule = $_GET['koderule'];
    $sql1 = "select * from tb_rules where kode_rule = '$koderule'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $koderule = $r1['kode_rule'];
    $pertanyaan = $r1['pertanyaan'];
    $ya = $r1['ya'];
    $tidak = $r1['tidak'];

    if ($koderule == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $koderule = $_POST['koderule'];
    $pertanyaan = $_POST['pertanyaan'];
    $ya = $_POST['ya'];
    $tidak = $_POST['tidak'];

    if ($koderule && $pertanyaan && $ya && $tidak) {
        if ($op == 'edit') {//untuk update
            $sql1 = "update tb_rules set kode_rule='$koderule', pertanyaan='$pertanyaan', ya='$ya', tidak='$tidak' where kode_rule = '$koderule'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {//untuk insert
            $sql1 = "INSERT INTO tb_rules(kode_rule, pertanyaan,ya,tidak) VALUES ('$koderule','$pertanyaan','$ya','$tidak')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan rule baru";
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
    <title>Data Rule</title>
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
                Create / Edit Rule
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                        header("refresh:2;url=admin-rule.php");//2 detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                     header("refresh:2;url=admin-rule.php");//2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="koderule" class="col-sm-2 col-form-label">Kode Rule</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="koderule" name="koderule"
                                    value="<?php echo $koderule ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pertanyaan" class="col-sm-2 col-form-label">Pertanyaan Gejala</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                                    value="<?php echo $pertanyaan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ya" class="col-sm-2 col-form-label">Jika Ya</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ya" name="ya"
                                    value="<?php echo $ya ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tidak" class="col-sm-2 col-form-label">Jika Tidak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tidak" name="tidak"
                                    value="<?php echo $tidak ?>">
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
                Data Rules
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Rule</th>
                            <th scope="col">Pertanyaan Gejala</th>
                            <th scope="col">Jika Ya</th>
                            <th scope="col">Jika Tidak</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tb_rules order by kode_rule asc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $koderule = $r2['kode_rule'];
                            $pertanyaan = $r2['pertanyaan'];
                            $ya = $r2['ya'];
                            $tidak = $r2['tidak'];
                            

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $koderule ?>
                                </th>
                                <td scope="row">
                                    <?php echo $pertanyaan ?>
                                </td>
                                <td scope="row">
                                    <?php echo $ya ?>
                                </td>
                                <td scope="row">
                                    <?php echo $tidak ?>
                                </td>
                                <td scope="row">
                                    <a href="admin-rule.php?op=edit&koderule=<?php echo $koderule?>"><button
                                            type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin-rule.php?op=delete&koderule=<?php echo $koderule?>" onclick="return confirm('Anda yakin menghapus rule?')"><button type="button" class="btn btn-danger">Delete</button></a>
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