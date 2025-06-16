<?php
include "../db.php";
$db = new db;

switch ($_GET['action'])
{
    case 'save':
        $nama_item  = $_POST['nama_item'];
        $uom        = $_POST['uom'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];

        $query = $db->add_item($nama_item, $uom, $harga_beli, $harga_jual);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal";
        }
    break;

    case 'edit':
        $id_item    = $_POST['id_item'];
        $nama_item  = $_POST['nama_item'];
        $uom        = $_POST['uom'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];

        $query = $db->update_item($id_item, $nama_item, $uom, $harga_beli, $harga_jual);
        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal";
        }
    break;

    case 'delete':
        $id_item = $_POST['id_item'];
        $query = $db->delete_item($id_item);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal";
        }
    break;
}
?>
