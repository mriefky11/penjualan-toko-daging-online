<?php
    require '../php/functions.php';
    $keyword = $_GET["keyword"];
    $query = " SELECT * FROM product
                WHERE
                ProductName LIKE '%$keyword%'
                ";
    $data_product = query($query);
?>
<table class="table table-striped mt-2 table-bordered">
    <thead>
      <tr class="text">
        <th scope="col">ID</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $i = 1; 
        foreach($data_product as $data) :
      ?>
      <tr>
        <th scope="row"><?= $data ["id"];?></th>
        <td><img src="img/<?= $data["img"];?>" height="100"width="100"></td>
        <td><?= $data ["ProductName"];?></td>
        <td><?= $data ["harga"];?></td>
        <td><?= $data ["Stock"];?></td>
        <td><?= $data ["Deskripsi"];?></td>
        <td class="text-center">
            <a href="ubah-product.php?id=<?= $data["id"];?>">
                <button type="button" class="btn btn-warning">
                    <i class="bi bi-pencil text-light mt-1"></i>
                </button>
            </a>
            <a href="hapus-product.php?id=<?= $data["id"];?>" onclick="return confirm ('Hapus data berikut?');" >
                <button type="button" class="btn btn-danger mt-1">
                    <i class="bi bi-trash3 text-light"></i>
                </button>
            </a>
        </td>
      </tr>
        <?php
          $i++;
          endforeach;
        ?>
    </tbody> 
  </table>