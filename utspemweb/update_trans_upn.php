<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn_upd = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";
         
          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn= $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_drive'];
        $jumlah_km = $_POST['jumlah_km'];
        $alamat = $_POST['alamat'];
    //query SQL
    $sql = "UPDATE trans_upn SET  id_trans_upn='$id_trans_upn', id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km' ,alamat='$alamat'";
    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: trans_upn.php?status='.$status);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>update transupn</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA TRANSUPN</h2>
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
                        <h2 style="margin: 30px 0 30px 0;">Update Data transupn</h2>
                        <form action="update_trans_upn.php" method="POST">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                          <div class="form-group">
                            <label>id_trans_upn</label>
                            <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>id_kondektur</label>
                            <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>id_bus</label>
                            <input type="text" class="form-control" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" >
                          </div>
                          <div class="form-group">
                            <label>id_driver</label>
                            <input type="text" class="form-control" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>jumlah_km</label>
                            <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" value="<?php echo $data['jummlah_km'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>alamat</label>
                            <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <?php endwhile; ?>
                        </form>
                    </div>
                  </div>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>