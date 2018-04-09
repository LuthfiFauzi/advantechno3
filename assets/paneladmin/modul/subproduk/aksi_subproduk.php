<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus produk
if ($act=='hapus'){
  mysql_query("DELETE FROM subproduk WHERE id_subproduk='$_GET[id]'");
  header('location:../../media.php?p=subproduk');
}

// Input produk
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);

    mysql_query("INSERT INTO subproduk(id_produk,
                                       gambar) 
                            VALUES('$_POST[produk]',
                                   '$nama_file_unik')");
  }
  else{
   echo "<script>window.alert('Anda belum memilih gambar');
        window.location=('../../media.php?p=subproduk')</script>";
        header('location:../../media.php?p=subproduk');
  }
  header('location:../../media.php?p=subproduk');
}

// Update produk
elseif ($act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
      echo "<script>window.alert('Anda belum memilih gambar');
        window.location=('location:../../media.php?module=subproduk')</script>";
        header('location:../../media.php?p=subproduk');
  }
  else{
    UploadImage($nama_file_unik);
   mysql_query("UPDATE subproduk SET id_produk = '$_POST[produk]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_subproduk   = '$_POST[id]'");
  }
  header('location:../../media.php?p=subproduk');
}
?>
