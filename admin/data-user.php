<?php
  require '../php/functions.php';
  $data_pelanggan = query("SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../style/dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
  </head>

  <body>
    <div class="wrapper">
      <!-- start navbar -->
      <nav class="navbar navbar-expand-md navbar-light py-1">
        <div class="container-fluid">
          <button class="btn btn-default" id="btn-slider" type="button">
            <i class="bi bi-list"></i>
          </button>
          <a class="navbar-brand me-auto text-dark fw-bold" href="#"
            >DashBoard</a
          >
        </div>
      </nav>
      <!-- end navbar -->

      <!-- start slider -->
      <div class="slider" id="sliders">
        <div class="slider-head">
          <div class="d-block pt-4 px-3">
            <img
              src="../assets/img/user.png"
              alt="user"
              class="slider-img-user mb-2"
            />
            <p class="fw-bold mb-0 lh-1 text-light">YourName</p>
            <small class="text-white">YourAccount@gmail.com</small>
          </div>
        </div>
        <hr class="soft my-1 bg-white" />
        <div class="slider-body px-1">
          <nav class="nav flex-column">
            <a class="nav-link px-3" href="#">
              <i class="bi bi-house-door-fill"></i> Home
            </a>
            <a class="nav-link px-3" href="#"
              ><i class="bi bi-basket2"></i> Pesanan
            </a>
            <a class="nav-link px-3" href="data-product.php">
              <i class="bi bi-box2-fill"></i> Product
            </a>
            <a class="nav-link px-3" href="#">
              <i class="bi bi-person-fill"></i> Data User
            </a>
            <a class="nav-link px-3" href="#">
              <i class="bi bi-bell-fill"></i> Notifikasi
            </a>
            <a class="nav-link px-3" href="#">
              <i class="bi bi-wallet-fill"></i> Transaksi
            </a>
            <a class="nav-link px-3" href="#">
              <i class="bi bi-door-open-fill"></i> LogOut
            </a>
          </nav>
        </div>
      </div>
      <!-- end slider -->

      <!-- start Main Page -->
      <div class="main-pages">
        <div class="container">
          <h2 class="text-center fw-bold">Data User</h2>
          <div class="mt-4 px-5">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-sm-4 mt-2">
                <input
                  class="form-control"
                  list="datalistOptions"
                  id="exampleDataList"
                  placeholder="Type to search..."
                />
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped mt-2 table-bordered">
                <thead>
                  <tr class="text">
                    <th scope="col">Member ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. Handphone</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1; 
                    foreach($data_pelanggan as $data) :
                  ?>
                  <tr>
                    <th scope="row"><?= $data ["MemberID"];?></th>
                    <td><img src="img/<?= $data["Email"];?>" width="50"></td>
                    <td><?= $data ["Nama"];?></td>
                    <td><?= $data ["Phone"];?></td>
                    <td><?= $data ["Alamat"];?></td>
                    <td><?= $data ["tgl_lahir"];?></td>
                    <td class="text-center">
                      <button type="button" class="btn btn-success">
                        <a href="detail-user.php?id=<?= $data["MemberID"];?>">Detail</a>
                      </button>
                    </td>
                  </tr>
                    <?php
                      $i++;
                      endforeach;
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end main page -->
    </div>
    <div class="slider-background" id="sliders-background"></div>
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebar.js"></script>
  </body>
</html>
