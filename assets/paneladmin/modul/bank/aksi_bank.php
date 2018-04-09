<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$act=$_GET[act];

// Hapus banner
if ($act=='hapus'){
  mysql_query("DELETE FROM bank WHERE id_bank='$_GET[id]'");
  header('location:../../index.php?p=bank');
}

// Input bank
elseif ($act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("INSERT INTO bank(nama_bank,
                                    no_rekening,
                                    pemilik,
                                    gambar) 
                            VALUES('$_POST[nama_bank]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO bank(nama_bank,
                                    no_rekening,
                                    pemilik) 
                            VALUES($_POST[nama_bank]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]')");
  }
  header('location:../../index.php?p=bank');
}

// Update banner
elseif ($act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]'                                   
                             WHERE id_bank = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file);
    mysql_query("UPDATE bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]',
                                   gambar       = '$nama_file'
                             WHERE id_bank = '$_POST[id]'");
  }
  header('location:../../index.php?p=bank');
}
?>
