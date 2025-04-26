<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <form action="proses-pembayaran.php" method="post" class="container">
        <label for="">ID Pembayaran</label> <input type="text" name="ip" id="" class="form-control"> <p></p>
        <select name="ipa" id="" class="form-select"> 
            <option value="">ID Pasien</option>
            <?php 
             include"k.php";
             $q="select id_pasien from pasien";
             $c=$conn->query($q);
             while ($t=$c->fetch_assoc()) {
                 echo" <table>
                 <tr>
                 <td><option value='$t[id_pasien]'>$t[id_pasien]</option></td>
                 </tr>
                 </table>";
                 
                }          
                
                ?>
            </select>        <p></p>
            <label for="">Total Biaya</label> <input type="text" name="tb" id="" class="form-control"><p></p>
            <label for="">Metode Pembayaran</label> <input type="text" name="mp" id="" class="form-control"><p></p>
        <label for="">Tanggal Pembayaran</label> <input type="date" name="tp" class="form-control" id=""><p></p>
        <label for=""><p></p></label> <input type="submit" value="Kirim" id="" class="form-control btn btn-primary">
    </form>
    
    <table class="table container">
        
        <tr>
            <td>NO</td>
            <td>ID Pembayaran</td>
            <td>ID Pasien</td>
            <td>Total Biaya</td>
            <td>Metode Pembayaran</td>
            <td>Tanggal Pembayaran</td>
            <td>Handling</td>
        </tr>
    <?php 
     include"k.php";
     $q="select * from pembayaran";
     $c=$conn->query($q);
     $no=1;
     while ($t=$c->fetch_assoc()) {
      echo"   <tr>
             <td>$no</td>
             <td>$t[id_pembayaran]</td>
             <td>$t[id_pasien]</td>
             <td>$t[total_biaya]</td>
             <td>$t[metode_pembayaran]</td>
             <td>$t[tanggal_pembayaran]</td>
             <td>
                 <a href='pembayaran.php?x=apus&d=$t[id_pembayaran]' class='btn btn-danger' style='float:left' onclick='return confirm(\"apakah anda yakin?\")  '>Hapus</a>
                 <a href='pembayaran.php?id=$t[id_pembayaran]' class='btn btn-warning'>Edit</a>
            </td>
         </tr>";
         $no++;
     }    


     if (isset($_GET['x'])) {
        if ($_GET['x']=='apus') {
            $q2="delete from pembayaran where id_pembayaran='$_GET[d]'";
            $c2=$conn->query($q2);
        }
     }
    ?>
</table>  
</body>
</html>