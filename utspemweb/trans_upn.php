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
                    <td colspan="6">
                        <table border="1" align="center" >
                            <thead>
                                <tr bgcolor="tan" >
                                    <th>id_trans_upn</th>
                                    <th>id_kondektur</th>
                                    <th>id_bus</th>
                                    <th>id_driver</th>
                                    <th>jumlah_km</th>
                                    <th>tanggal</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM trans_upn";
                                $result = mysqli_query(connection(),$query);
                                ?>

                                <?php 
                                    while($data = mysqli_fetch_array($result)): 
                                ?>
                                    <tr>
                                            <td>
                                                <?php 
                                                    echo $data['id_trans_upn'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['id_kondektur'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['id_bus'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['id_driver'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['jumlah_km'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['tanggal'];  
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo "update_trans_upn.php?id_trans_upn=".$data['id_trans_upn']; ?>" > Update</a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "hapus_trans_upn.php?id_trans_upn=".$data['id_trans_upn']; ?>"> Delete</a>
                                            </td>
                                    </tr>
                                    
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 