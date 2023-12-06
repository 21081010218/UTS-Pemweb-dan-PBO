<?php 
    include ('koneksi.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur= $_POST['id_kondektur'];
        $nama = $_POST['nama'];
        //query SQL
        $query = "INSERT INTO kondektur (id_kondektur, nama) 
        VALUES('$id_kondektur', '$nama')"; 
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
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form Kondektur</h2>
                      <form action="menambah_kondektur.php" method="POST">
                      <div class="form-group">
                        <label>id_kondektur</label>
                        <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required">
                      </div>
                      <div class="form-group">
                        <label>nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
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