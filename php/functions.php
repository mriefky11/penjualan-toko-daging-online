<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "toko online1");

    // menampilkan data product
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }


    // tambah data product
    function tambah_product($data){
        global $conn;
        $ProductName = htmlspecialchars($data["ProductName"]);
        $kategori = $data["kategori"];
        $Deskripsi = htmlspecialchars($data["Deskripsi"]);
        $Stock = htmlspecialchars($data["Stock"]);
        $harga = htmlspecialchars($data["harga"]);
        
        // upload gambar
        $img = upload();
        if(!$img){
            return false;
        };

        $tbh_product = "INSERT INTO product VALUES('','$ProductName','$kategori','$Deskripsi','$Stock','$harga','$img')";
        mysqli_query($conn, $tbh_product);
        return mysqli_affected_rows($conn);
    }
    // fungsi upload gambar
    function upload(){
            $namaFile = $_FILES['img']['name'];
            $ukuranFile = $_FILES['img']['size'];
            $error = $_FILES['img']['error'];
            $tmpName = $_FILES['img']['tmp_name'];

            //cek upload gambar ada / tidak

            if($error === 4){
                echo"<script>
                        alert('Mohon masukan gambar');
                    </script>";
                return false;
            }
            // cek apakah yang diapload adalah gambar
            $ekstensiGambarValid = ['jpg','png','jpeg'];
            $ekstensiGambar = explode('.',$namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
                echo"<script>
                        alert('File yang di upload bukan gambar');
                    </script>";
                return false;
            }

            // cek ukuran file
            if($ukuranFile > 1000000){
                echo"<script>
                        alert('Gambar yang diupload terlalu besar');
                    </script>";
                return false;
            }

            //generate nama file
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;

            //upload gambar apabila lolos pengecekan
            move_uploaded_file($tmpName,'img/'.$namaFileBaru);
            return $namaFileBaru;

        
    }
    

    //hapus data product

    function hapus_product($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM product WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    //ubah product

    function ubah_data_product($ubah_data_product){
        
        global $conn;

        $id = $ubah_data_product["id"];
        $ProductName = htmlspecialchars($ubah_data_product["ProductName"]);
        $kategori = htmlspecialchars($ubah_data_product["kategori"]);
        $Deskripsi = htmlspecialchars($ubah_data_product["Deskripsi"]);
        $Stock = htmlspecialchars($ubah_data_product["Stock"]);
        $harga = htmlspecialchars($ubah_data_product["harga"]);
        $imglama = ($ubah_data_product["imglama"]);

        //cek apakah user upload gambar baru

        if ($_FILES['img']['error'] === 4  ){
            $img = $imglama;
        }else{
            $img = upload();
        }
        

        $ubh_product = "UPDATE product SET 
                    id = '$id',
                    ProductName = '$ProductName',
                    kategori = '$kategori',
                    Deskripsi = '$Deskripsi',
                    Stock = '$Stock',
                    harga = '$harga',
                    img = '$img'
                    WHERE id = $id
                ";
        mysqli_query($conn, $ubh_product);
        return mysqli_affected_rows($conn);
    }

    function cari_product($keyword){
        $query = " SELECT * FROM product
                    WHERE
                    ProductName LIKE '%$keyword%'
                ";
        
        return query($query);
    }
?>