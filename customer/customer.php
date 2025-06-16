<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $nama_customer = $_POST['nama_customer'];
        $alamat        = $_POST['alamat'];
        $telp          = $_POST['telp'];
        $fax           = $_POST['fax'];
        $email         = $_POST['email'];

        $query = $db->add_customer($nama_customer, $alamat, $telp, $fax, $email);
        
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal!";
        }
    break;

    case 'update':
        $id_customer   = $_POST['id_customer'];
        $nama_customer = $_POST['nama_customer'];
        $alamat        = $_POST['alamat'];
        $telp          = $_POST['telp'];
        $fax           = $_POST['fax'];
        $email         = $_POST['email'];

        $query = $db->update_customer($id_customer, $nama_customer, $alamat, $telp, $fax, $email);
        
        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal!";
        }
    break;

    case 'delete':
        $id_customer = $_POST['id_customer'];

        $query = $db->delete_customer($id_customer);
        
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal!";
        }
    break;
}
?>
