<?php
include "../db.php";
$db = new db;

switch ($_GET['action'])
{
    case 'save':
        $tgl_sales   = $_POST['tgl_sales'];
        $id_customer = $_POST['id_customer'];
        $do_number   = $_POST['do_number'];
        $status      = $_POST['status'];

        $query = $db->add_sales($tgl_sales, $id_customer, $do_number, $status);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal";
        }
    break;

    case 'edit':
        $id_sales   = $_POST['id_sales'];
        $tgl_sales  = $_POST['tgl_sales'];
        $id_customer = $_POST['id_customer'];
        $do_number  = $_POST['do_number'];
        $status     = $_POST['status'];

        $query = $db->update_sales($id_sales, $tgl_sales, $id_customer, $do_number, $status);
        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal";
        }
    break;

    case 'delete':
        $id_sales = $_POST['id_sales'];
        $query = $db->delete_sales($id_sales);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal";
        }
    break;
}
?>
