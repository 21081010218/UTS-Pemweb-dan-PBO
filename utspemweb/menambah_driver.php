<?php 
    include ('koneksi.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver= $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $id_alamat= $_POST['alamat'];
      
        //query SQL
        $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
        VALUES('$id_driver', '$nama', '$no_sim', '$alamat')"; 
  
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
                            <a class="nav-link" href="<?php echo "trans_upn.php"; ?>"><b>trans_upn</b></a>
                        </center>    
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "menambah_driver.php"; ?>"><b>Menambah Data</b></a>
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
                
                      <h2 style="margin: 30px 0 30px 0;">Form Driver</h2>
                      <form action="menambah_driver.php" method="POST">
                      <div class="form-group">
                        <label>id_driver</label>
                        <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
                      </div>
                      <div class="form-group">
                        <label>nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label>no_sim</label>
                        <input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required">
                      </div>
                      <div class="form-group">
                        <label>alamat</label>
                        <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
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