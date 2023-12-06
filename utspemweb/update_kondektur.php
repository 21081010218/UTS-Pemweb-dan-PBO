<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $kondektur_upd = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";
         
          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur= $_POST['id_kondektur'];
        $nama = $_POST['nama'];
    //query SQL
    $sql = "UPDATE kondektur SET  id_kondektur='$id_kondektur', nama='$nama'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: kondektur.php?status='.$status);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>update driver</title>
</head>
<body>
    <div class = "container" >
        <h2 align="center">DATA KONDEKTUR</h2>
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
                            <a class="nav-link" href="<?php echo "menambah_kondektur.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 style="margin: 30px 0 30px 0;">Update Data kondektur</h2>
                        <form action="update_kondektur.php" method="POST">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                          <div class="form-group">
                            <label>id_kondektur</label>
                            <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>nama</label>
                            <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
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