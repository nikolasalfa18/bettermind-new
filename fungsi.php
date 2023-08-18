<?php

function answer($kode){
    if($kode=='G001'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G001-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G002'>Tidak</a>";
    }

    if($kode=='G001-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D1'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G003'>Tidak</a>";
    }


    if($kode=='G003'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D3'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G002'>Tidak</a>";
    }
    if($kode=='G002'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G002-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G004'>Tidak</a>";
    }
    if($kode=='G002-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D2'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G004'>Tidak</a>";
    }
    if($kode=='G004'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G004-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G005'>Tidak</a>";
    }
    if($kode=='G004-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G004-b'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G005'>Tidak</a>";
    }    
    if($kode=='G004-b'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D4'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G005'>Tidak</a>";
    }
    if($kode=='G005'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G005-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G007'>Tidak</a>";
    }
    if($kode=='G005-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G006'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G-007'>Tidak</a>";
    }
    if($kode=='G006'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G006-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href=solusi.php?kode=D5'>Tidak</a>";
    }
    if($kode=='G006-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G006-b'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G007'>Tidak</a>";
    }

    if($kode=='G006-b'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D6'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G007'>Tidak</a>";
    }
    if($kode=='G007'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D7'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G008'>Tidak</a>";
    }
    if($kode=='G008'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G008-a'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009'>Tidak</a>";
    }
    if($kode=='G008-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G008-b'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009'>Tidak</a>";
    }
    if($kode=='G008-b'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G008-c'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009'>Tidak</a>";
    }    
    if($kode=='G008-c'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D8'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009'>Tidak</a>";
    }
    if($kode=='G009'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=X'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009-a'>Tidak</a>";
    }
    if($kode=='G009-a'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=X'>Bisa</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='question.php?kode=G009-b'>Tidak Bisa</a>";
    }
    if($kode=='G009-b'){
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=D9'>Ya</a>";
        echo "<a class='btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3' href='solusi.php?kode=X'>Tidak</a>";
    }
}
function kesimpulan($diagnosa){
    include 'koneksi.php';
    $sql = "SELECT * from tb_kesimpulan WHERE solusi='$diagnosa' AND status='setuju'";
    $data = mysqli_query($connect,$sql);
    while ($row = mysqli_fetch_assoc($data)) {
        echo '<p>-'.$row['fakta'].'</p>';
    }  
}

function solusi($kode){    
    if ($kode=='D1') {
        $diagnosa = "Depresi";
        kesimpulan($diagnosa);        
    }
    if ($kode=='D2') {
        $diagnosa = "Hypomania/Mania";
        kesimpulan($diagnosa);
    }
    if ($kode=='D3') {
        $diagnosa = "Distimia";
        kesimpulan($diagnosa);
    }
    if ($kode=='D4') {
        $diagnosa = "Generalized Anxiety Disorder";
        kesimpulan($diagnosa);
    }
    if ($kode=='D5') {
        $diagnosa = "Obsessive Compulsive Disorder (OCD)";
        kesimpulan($diagnosa);
    }
    if ($kode=='D6') {
        $diagnosa = "Obsessive Compulsive Personality Disorder (OCPD)";
        kesimpulan($diagnosa);
    }
    if ($kode=='D7') {
        $diagnosa = "Panic Attack";
        kesimpulan($diagnosa);
    }
    if ($kode=='D8') {
        $diagnosa = "Post-Traumatic Stress Disorder (PTSD)";
        kesimpulan($diagnosa);
    }
    if ($kode=='D9') {
        $diagnosa = "Social Phobia";
        kesimpulan($diagnosa);
    }
    
}

?>