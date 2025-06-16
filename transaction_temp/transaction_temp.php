<?php
include "../db.php";
$db = new db;

switch ($_GET['action'])
{
    case 'save':
        $id_item    = $_POST['id_item'];
        $quantity   = $_POST['quantity'];
        $price      = $_POST['price'];
        $amount     = $_POST['amount'];
        $session_id = $_POST['session_id'];
        $remark     = $_POST['remark'];

        $query = $db->add_transactionTemp($id_item, $quantity, $price, $amount, $session_id, $remark);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal";
        }
    break;

    case 'edit':
        $id_transaction = $_POST['id_transaction'];
        $id_item        = $_POST['id_item'];
        $quantity       = $_POST['quantity'];
        $price          = $_POST['price'];
        $amount         = $_POST['amount'];
        $session_id     = $_POST['session_id'];
        $remark         = $_POST['remark'];

        $query = $db->update_transactionTemp($id_transaction, $id_item, $quantity, $price, $amount, $session_id, $remark);
        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal";
        }
    break;

    case 'delete':
        $id_transaction = $_POST['id_transaction'];
        $query = $db->delete_transactionTemp($id_transaction);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal";
        }
    break;
}
?>
