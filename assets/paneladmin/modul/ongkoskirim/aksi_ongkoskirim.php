<?php
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Ongkos Kirim
if ($act=='hapus'){
  mysql_query("DELETE FROM kota WHERE id_kota='$_GET[id]'");
  header('location:../../index.php?p=ongkoskirim');
}

// Input Ongkos Kirim
elseif ($act=='input'){
  mysql_query("INSERT INTO kota(id_perusahaan,nama_kota,ongkos_kirim) VALUES('$_POST[perusahaan]','$_POST[nama_kota]','$_POST[ongkos_kirim]')");
  header('location:../../index.php?p=ongkoskirim');
}

// Update Ongkos Kirim
elseif ($act=='update'){
  mysql_query("UPDATE kota SET id_perusahaan='$_POST[perusahaan]' ,nama_kota = '$_POST[nama_kota]', ongkos_kirim='$_POST[ongkos_kirim]' WHERE id_kota = '$_POST[id]'");
  header('location:../../index.php?p=ongkoskirim');
}
?>
