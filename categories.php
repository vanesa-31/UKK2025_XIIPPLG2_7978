<h1 class="mt-4">Kategori Tugas</h1>
<div class="container-fluid px-4">     
        <a href="?page=categories_tambah" class="btn btn-primary">+ tambah Data</a>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Categories</th>
                    <th>User_ID</th>
                    <th>Aksi</th>
                </tr>

                <?php
                    $query = mysqli_query($koneksi, "SELECT*FROM categories");
                    while($data = mysqli_fetch_array($query)){

                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['category']; ?></td>
                            <td><?php echo $data['user_id']; ?></td>
                            <td>
                                <a href="?page=categories_hapus&&id=<?php echo $data['user_id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    
                ?>

            </table>
  </div>