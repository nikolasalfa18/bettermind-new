<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sispak";

$koneksi = mysqli_connect($host, $user, $pass, $db);


if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}

$kodekesimpulan = "";
$solusi = "";
$fakta = "";
$oleh = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op=='delete'){
    $kodekesimpulan = $_GET['kodekesimpulan'];
    $sql1 = "delete from tb_kesimpulan where kode_kesimpulan = '$kodekesimpulan'";
    $q1     = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus kesimpulan";
    }else{
        $error = "Gagal melakukan delete kesimpulan";
    }
}


if ($op == 'edit') {
    $kodekesimpulan = $_GET['kodekesimpulan'];
    $sql1 = "select * from tb_kesimpulan where kode_kesimpulan = '$kodekesimpulan'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $kodekesimpulan = $r1['kode_kesimpulan'];
    $solusi = $r1['solusi'];
    $fakta = $r1['fakta'];
    $oleh = $r1['oleh'];
    $status = $r1['status'];

    if ($kodekesimpulan == '') {
        $error = "Data oleh ditemukan";
    }
}

if (isset($_POST['simpan'])) { //untuk create
    $kodekesimpulan = $_POST['kodekesimpulan'];
    $solusi = $_POST['solusi'];
    $fakta = $_POST['fakta'];
    $oleh = $_POST['oleh'];
    $status = $_POST['status'];

    if ($kodekesimpulan && $solusi && $fakta && $oleh && $status) {
        if ($op == 'edit') {//untuk update
            $sql1 = "update tb_kesimpulan set kode_kesimpulan='$kodekesimpulan', solusi='$solusi', fakta='$fakta', oleh='$oleh', status='$status' where kode_kesimpulan = '$kodekesimpulan'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {//untuk insert
            $sql1 = "INSERT INTO tb_kesimpulan(kode_kesimpulan,solusi,fakta,oleh,status) VALUES ('$kodekesimpulan','$solusi','$fakta','$oleh','$status')";
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
    <title>Data Kesimpulan</title>
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
                Create / Edit Kesimpulan
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                        header("refresh:2;url=admin-kesimpulan.php");//2 detik
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                     header("refresh:2;url=admin-kesimpulan.php");//2 detik
                }
                ?>
                <form action="" method="POST">
                    <form>
                        <div class="form-group row">
                            <label for="kodekesimpulan" class="col-sm-2 col-form-label">Kode Kesimpulan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodekesimpulan" name="kodekesimpulan"
                                    value="<?php echo $kodekesimpulan ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="solusi" class="col-sm-2 col-form-label">Penyakit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="solusi" name="solusi"
                                    value="<?php echo $solusi ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fakta" class="col-sm-2 col-form-label">Fakta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fakta" name="fakta"
                                    value="<?php echo $fakta ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="oleh" class="col-sm-2 col-form-label">Diinput oleh</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="oleh" name="oleh"
                                    value="<?php echo $oleh ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="status" name="status"
                                    value="<?php echo $oleh ?>">
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
                Data Kesimpulan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kode Kesimpulan</th>
                            <th scope="col">Penyakit</th>
                            <th scope="col">Fakta</th>
                            <th scope="col">Diinput Oleh</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from tb_kesimpulan order by kode_kesimpulan asc";
                        $q2 = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $kodekesimpulan = $r2['kode_kesimpulan'];
                            $solusi = $r2['solusi'];
                            $fakta = $r2['fakta'];
                            $oleh = $r2['oleh'];
                            $status = $r2['status'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $kodekesimpulan ?>
                                </th>
                                <td scope="row">
                                    <?php echo $solusi ?>
                                </td>
                                <td scope="row">
                                    <?php echo $fakta ?>
                                </td>
                                <td scope="row">
                                    <?php echo $oleh ?>
                                </td>
                                <td scope="row">
                                    <?php echo $status ?>
                                </td>
                                <td scope="row">
                                    <a href="admin-kesimpulan.php?op=edit&kodekesimpulan=<?php echo $kodekesimpulan?>"><button
                                            type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin-kesimpulan.php?op=delete&kodekesimpulan=<?php echo $kodekesimpulan?>" onclick="return confirm('Anda yakin menghapus kesimpulan?')"><button type="button" class="btn btn-danger">Delete</button></a>
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