<?php
    include('koneksi.php');
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
                    <td colspan="6">
                        <table border="1" align="center" >
                            <thead>
                                <tr bgcolor="tan" >
                                    <th>id_bus</th>
                                    <th>plat</th>
                                    <th>status</th>
                                    <th>opsi</th>
                                    <th>total KM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM bus";
                                $result = mysqli_query(connection(),$query);
                                ?>

                                <?php 
                                    while($data = mysqli_fetch_array($result)): 
                                ?>
                                    <tr>
                                            <td>
                                                <?php 
                                                    echo $data['id_bus'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['plat'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                      if ($data["status"] == 1) {
                                                        $warna = "green";
                                                    } elseif ($data["status"] == 2) {
                                                        $warna = "yellow";
                                                    } elseif ($data["status"] == 0) {
                                                        $warna = "red";
                                                    }
                                                  $status=$data["status"];
                                                    echo "<button style ='background-color:$warna;'>$status</button>"
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                     echo $data['total_km']; 
                                                     ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo "update_bus.php?id_bus=".$data['id_bus']; ?>" > Update</a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "hapus_bus.php?id_bus=".$data['id_bus']; ?>"> Delete</a>
                                            </td>
                                    </tr>
                                    <select name="status">
                                                <option value="all">Semua</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                                <option value="0">Sedang Perawatan</option>
                                    </select>
                                          <?php
                                           if (isset($_GET['status']) && $_GET['status'] != 'all') {
                                            $status = $_GET['status'];
                                            $query = "SELECT * FROM bus WHERE status='$status'";
                                             } else {
                                            $query = "SELECT * FROM bus";
                                             } ?>

<button type="submit">Filter</button>

                                    
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 