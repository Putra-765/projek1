<?php 
include"k.php";
$ip=$_POST['ip'];
$ipa=$_POST['ipa'];
$tb=$_POST['tb'];
$mp=$_POST['mp'];
$tp=$_POST['tp'];

$q2="select * from pembayaran";
$c2=$conn->query($q2);
$r=$c2->num_rows;

if (empty($ip)) {
    echo"<script>alert('Input gagal'); window.location='pembayaran.php'</script>";
}


if ($r > 0) {
    $q="INSERT INTO  pembayaran ( id_pembayaran ,  id_pasien ,  total_biaya ,  metode_pembayaran ,  tanggal_pembayaran ) 
    VALUES ($ip  ,$ipa  ,'$tb'  ,'$mp'  ,'$tp')";
    $c=$conn->query($q);
    
    echo"<script>alert('Input berhasil'); window.location='pembayaran.php'</script>";
}

else {
    echo"<script>alert('Input gagal'); window.location='pembayaran.php'</script>";
}



?>
