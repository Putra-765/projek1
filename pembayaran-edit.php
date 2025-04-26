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
            <?php
             if (isset($_POST["edita"])) {
                include"k.php";
                $q="select * from pembayaran where id_pembayaran='$_GET[id]'";
                $c=$conn->query($q);
                $t=$c->fetch_assoc();
                ?>
                 <form action="#" method="post" class="container">
                        <label for="">ID Pembayaran</label> <input type="text" name="ip" id="" class="form-control" value=" <?php echo $t['id_pembayaran']?>"> <p></p>
                        <select name="ipa" id="" class="form-select"> 
                            <option value="">ID Pasien</option>
                            <?php 
                             include"k.php";
                             $i="select id_pasien from pasien";
                             $j=$conn->query($i);
                             while ($a=$j->fetch_assoc()) {
                                 echo" <table>
                                 <tr>
                                 <td><option value='$a[id_pasien]'>$a[id_pasien]</option></td>
                                 </tr>
                                 </table>";
                                 
                                }          
                                
                                ?>
                            </select>        <p></p>
                            <label for="">Total Biaya</label> <input type="text" name="tb" id="" class="form-control" value=" <?php echo $t['total_biaya'] ?> "><p></p>
                            <label for="">Metode Pembayaran</label> <input type="text" name="mp" id="" class="form-control" value=" <?php echo $t['metode_pembayaran'] ?> "><p></p>
                        <label for="">Tanggal Pembayaran</label> <input type="date" name="" class="form-control" id="" value=" <?php echo $t['tanggal_pembayaran'] ?> "><p></p>
                        <label for=""><p></p></label> <input type="submit" value="edit" name="edit" id="" class="form-control btn btn-primary">
                    </form>
             }
            
                <?php 
                 if (isset($_POST["edit"])) {
                    $id2=$_POST["id"]
                    $q2="UPDATE  pembayaran  SET  id_pembayaran =$_POST[ip], id_pasien =$_POST[ipa], total_biaya="$_POST[tb]", metode_pembayaran = "$_POST[mp]", tanggal_pembayaran = "$_POST[tp]" WHERE id_pembayaran='$_GET[id]'";
                    $c2=$conn->query($q2);
                    header("location:pembayaran.php");
                 }
                ?>
</body>
</html>
