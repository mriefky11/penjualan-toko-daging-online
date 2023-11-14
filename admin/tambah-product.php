<?php
  require '../php/functions.php';
  if (isset($_POST["submit"])){
    if(tambah_product($_POST)>0){
      echo"
        <script>
          alert('Data berhasil ditambahkan');
          document.location.href = 'data-product.php';
        </script>
      ";
    }else{
    echo"
        <script>
          alert('Data gagal ditambahkan');
          document.location.href = 'tambah-product.php';
        </script>
      ";
  }
}
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
            <a class="nav-link px-3" href="data-user.php">
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
      <div class="main-pages ">
        <div class="container">
          <h2 class="text-center fw-bold">Tambah Product</h2>
          <div class="mt-4 px-5">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="ProductName" class="form-label"
                  >Nama Product</label
                >
                <input
                  type="text"
                  class="form-control"
                  name="ProductName"
                  id="ProductName"
                  placeholder="Daging Bagong"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label"
                  >Harga</label
                >
                <input
                  type="number"
                  class="form-control"
                  name="harga"
                  id="harga"
                  placeholder="100000"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="Stock" class="form-label"
                  >Stock</label
                >
                <input
                  type="number"
                  class="form-control"
                  name="Stock"
                  id="Stock"
                  placeholder="20"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="img" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="img" name="img" />
              </div>
              <label for="kategori" class="form-label"
                >Kategori</label
              >
              <select
                class="form-select mb-3"
                aria-label="Default select example"
                name="kategori"
                id="kategori"
                required
              >
                <option selected>Pilih Salah Satu</option>
                <option value="1001">ayam</option>
                <option value="1002">sapi</option>
                <option value="1003">domba</option>
                <option value="1004">lainnya</option>
              </select>
              <div class="mb-3">
                <label for="Deskripsi" class="form-label"
                  >Deskripsi</label
                >
                <textarea
                  class="form-control"
                  id="Deskripsi"
                  rows="3"
                  name="Deskripsi"
                  required
                ></textarea>
              </div>
              <button type="submit" class="btn btn-success" name="submit">Tambah</button>
            </form>
            
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
