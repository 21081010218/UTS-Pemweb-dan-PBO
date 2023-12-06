<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus_upd = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";
         
          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_bus= $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
    //query SQL
    $sql = "UPDATE bus SET  id_bus='$id_bus', plat='$plat', status='status'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: bus.php?status='.$status);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>update bus</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA BUS</h2>
        <div class = "container" >
        <h2 align="center"><u><b>transupn</b></u></h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b>kondektur</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>driver</b></a>
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
                            <a class="nav-link" href="<?php echo "menambah_bus.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 style="margin: 30px 0 30px 0;">Update Data Bus</h2>
                        <form action="update_bus.php" method="POST">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                          <div class="form-group">
                            <label>id_bus</label>
                            <input type="text" class="form-control" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>plat</label>
                            <input type="text" class="form-control" placeholder="plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>status</label>
                            <input type="text" class="form-control" placeholder="status" name="status" value="<?php echo $data['status'];  ?>" required="required" >
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