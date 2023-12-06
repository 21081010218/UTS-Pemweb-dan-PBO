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
                    <td colspan="6">
                        <table border="1" align="center" >
                            <thead>
                                <tr bgcolor="tan" >
                                    <th>id_driver</th>
                                    <th>nama</th>
                                    <th>no_sim</th>
                                    <th>alamat</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM driver";
                                $result = mysqli_query(connection(),$query);
                                ?>

                                <?php 
                                    while($data = mysqli_fetch_array($result)): 
                                ?>
                                    <tr>
                                            <td>
                                                <?php 
                                                    echo $data['id_driver'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['nama'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['no_sim'];  
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $data['alamat'];  
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo "update_driver.php?id_driver=".$data['id_driver']; ?>" > Update</a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "hapus_driver.php?id_driver=".$data['id_driver']; ?>"> Delete</a>
                                            </td>
                                    </tr>
                                    
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 