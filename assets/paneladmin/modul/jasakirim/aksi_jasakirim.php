<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$p=$_GET[p];
$act=$_GET[act];

// Hapus produk
if ($act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");     
  }
  else{
     mysql_query("DELETE FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
  }
  header('location:../../index.php?p=produk');


  mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
  header('location:../../index.php?p=jasakirim');
}

// Input jasa kirim
elseif ($act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 


  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../index.php?p=produk)</script>";
    }
    else{
    UploadBanner($nama_file_unik);

    mysql_query("INSERT INTO shop_pengiriman(nama_perusahaan,
											alias,
											gambar) 
                            VALUES('$_POST[nama_perusahaan]',
                                   '$_POST[alias]',
                                   '$nama_file_unik')");
  header('location:../../index.php?p=jasakirim');
  }
  }
  else{
    mysql_query("INSERT INTO shop_pengiriman(nama_perusahaan,
											alias) 
                            VALUES('$_POST[nama_perusahaan]',
                                   '$_POST[alias]')");
  header('location:../../index.php?p=jasakirim');
  }
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
    mysql_query("UPDATE shop_pengiriman SET nama_perusahaan = '$_POST[nama_perusahaan]',
                                   alias           = '$_POST[alias]'
                             WHERE id_perusahaan  = '$_POST[id]'");
  header('location:../../index.php?p=jasakirim');
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../index.php?p=jasakirim)</script>";
    }
    else{
     UploadBanner($nama_file_unik);
    mysql_query("UPDATE shop_pengiriman SET nama_perusahaan = '$_POST[nama_produk]',
                                   alias         			= '$_POST[alias]',
                                   gambar         			= '$nama_file_unik'   
                             WHERE id_perusahaan   			= '$_POST[id]'");
    header('location:../../index.php?p=jasakirim');
    }
  }
}
}
?>
