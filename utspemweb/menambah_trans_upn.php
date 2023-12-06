<?php 
    include ('koneksi.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn= $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver= $_POST['id_driver'];
        $jumlah_km= $_POST['jummlah_km'];
        $tanggal= $_POST['tanggal'];
      
        //query SQL
        $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
        VALUES('$id_trans_upn', '$id_kondektur', '$id_bus','$id_driver','$jumlah_km', '$alamat')"; 
  
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>transupn</title>
</head>
<body>
<div class = "container" >
        <h2 align="center"><u><b>transupn</b></u></h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>bus</b></a>
                        </center>    
                    </td>
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b>kondektur</b></a>
                        </center>    
                    </td>
                    <td class="empat">
                        <center>    
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>driver</b></a>
                        </center>    
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "menambah_trans_upn.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>
                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form TRANS UPN</h2>
                      <form action="menambah_driver.php" method="POST">
                      <div class="form-group">
                        <label>id_trans_upn</label>
                        <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" required="required">
                      </div>
                      <div class="form-group">
                        <label>id_kondektur</label>
                        <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required">
                      </div>
                      <div class="form-group">
                        <label>id_bus</label>
                        <input type="text" class="form-control" placeholder="id_bus" name="id_bus" required="required">
                      </div>
                      <div class="form-group">
                        <label>id_driver</label>
                        <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
                      </div>
                      <div class="form-group">
                        <label>jumlah_km</label>
                        <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" required="required">
                      </div>
                      <div class="form-group">
                        <label>tanggal</label>
                        <input type="text" class="form-control" placeholder="tanggal" name="tanggal" required="required">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>