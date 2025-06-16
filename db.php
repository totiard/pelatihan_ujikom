<?php

class db {
    private $koneksi;

    function __construct() {
        $this->koneksi = new mysqli("localhost", "root", "", "dev_koperasi");
        if ($this->koneksi->connect_error) {
            die("Koneksi gagal: " . $this->koneksi->connect_error);
        }
    }

    // LOGIN USER (Plain password)
    function get_user($username, $password) {
        $stmt = $this->koneksi->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ================= CUSTOMER =================
    function get_allCustomer() {
        return $this->koneksi->query("SELECT * FROM customer");
    }

    function get_customerById($id_customer) {
        $stmt = $this->koneksi->prepare("SELECT * FROM customer WHERE id_customer = ?");
        $stmt->bind_param("i", $id_customer);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_customer($nama_customer, $alamat, $telp, $fax, $email) {
        $stmt = $this->koneksi->prepare("INSERT INTO customer (nama_customer, alamat, telp, fax, email) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nama_customer, $alamat, $telp, $fax, $email);
        return $stmt->execute();
    }

    function update_customer($id_customer, $nama_customer, $alamat, $telp, $fax, $email) {
        $stmt = $this->koneksi->prepare("UPDATE customer SET nama_customer=?, alamat=?, telp=?, fax=?, email=? WHERE id_customer=?");
        $stmt->bind_param("sssssi", $nama_customer, $alamat, $telp, $fax, $email, $id_customer);
        return $stmt->execute();
    }

    function delete_customer($id_customer) {
        $stmt = $this->koneksi->prepare("DELETE FROM customer WHERE id_customer=?");
        $stmt->bind_param("i", $id_customer);
        return $stmt->execute();
    }
    

    // ================= ITEM =================
    function get_allItem() {
        return $this->koneksi->query("SELECT * FROM item");
    }

    function get_itemById($id_item) {
        $stmt = $this->koneksi->prepare("SELECT * FROM item WHERE id_item = ?");
        $stmt->bind_param("i", $id_item);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_item($nama_item, $uom, $harga_beli, $harga_jual) {
        $stmt = $this->koneksi->prepare("INSERT INTO item (nama_item, uom, harga_beli, harga_jual) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdd", $nama_item, $uom, $harga_beli, $harga_jual);
        return $stmt->execute();
    }

    function update_item($id_item, $nama_item, $uom, $harga_beli, $harga_jual) {
        $stmt = $this->koneksi->prepare("UPDATE item SET nama_item=?, uom=?, harga_beli=?, harga_jual=? WHERE id_item=?");
        $stmt->bind_param("ssddi", $nama_item, $uom, $harga_beli, $harga_jual, $id_item);
        return $stmt->execute();
    }

    function delete_item($id_item) {
        $stmt = $this->koneksi->prepare("DELETE FROM item WHERE id_item=?");
        $stmt->bind_param("i", $id_item);
        return $stmt->execute();
    }

    // ================= SALES =================
    function get_allSales() {
        // Join ke customer agar dapat nama customer
        return $this->koneksi->query("SELECT sales.*, customer.nama_customer FROM sales LEFT JOIN customer ON sales.id_customer = customer.id_customer");
    }

    function get_salesById($id_sales) {
        $stmt = $this->koneksi->prepare("SELECT * FROM sales WHERE id_sales = ?");
        $stmt->bind_param("i", $id_sales);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_sales($tgl_sales, $id_customer, $do_number, $status) {
        $stmt = $this->koneksi->prepare("INSERT INTO sales (tgl_sales, id_customer, do_number, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $tgl_sales, $id_customer, $do_number, $status);
        return $stmt->execute();
    }

    function update_sales($id_sales, $tgl_sales, $id_customer, $do_number, $status) {
        $stmt = $this->koneksi->prepare("UPDATE sales SET tgl_sales=?, id_customer=?, do_number=?, status=? WHERE id_sales=?");
        $stmt->bind_param("sissi", $tgl_sales, $id_customer, $do_number, $status, $id_sales);
        return $stmt->execute();
    }

    function delete_sales($id_sales) {
        $stmt = $this->koneksi->prepare("DELETE FROM sales WHERE id_sales=?");
        $stmt->bind_param("i", $id_sales);
        return $stmt->execute();
    }

    // ================= TRANSACTION =================
    function get_allTransaction() {
        // Join ke item agar dapat nama item
        return $this->koneksi->query("SELECT transaction.*, item.nama_item FROM transaction LEFT JOIN item ON transaction.id_item = item.id_item");
    }

    function get_transactionById($id_transaction) {
        $stmt = $this->koneksi->prepare("SELECT * FROM transaction WHERE id_transaction = ?");
        $stmt->bind_param("i", $id_transaction);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_transaction($id_item, $quantity, $price, $amount) {
        $stmt = $this->koneksi->prepare("INSERT INTO transaction (id_item, quantity, price, amount) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iidd", $id_item, $quantity, $price, $amount);
        return $stmt->execute();
    }

    function update_transaction($id_transaction, $id_item, $quantity, $price, $amount) {
        $stmt = $this->koneksi->prepare("UPDATE transaction SET id_item=?, quantity=?, price=?, amount=? WHERE id_transaction=?");
        $stmt->bind_param("iiddi", $id_item, $quantity, $price, $amount, $id_transaction);
        return $stmt->execute();
    }

    function delete_transaction($id_transaction) {
        $stmt = $this->koneksi->prepare("DELETE FROM transaction WHERE id_transaction=?");
        $stmt->bind_param("i", $id_transaction);
        return $stmt->execute();
    }
    
    // ================= TRANSACTION TEMP =================
    function get_allTransactionTemp() {
        return $this->koneksi->query("SELECT transaction_temp.*, item.nama_item 
                                    FROM transaction_temp 
                                    LEFT JOIN item ON transaction_temp.id_item = item.id_item");
    }

    function get_transactionTempById($id_transaction) {
        $stmt = $this->koneksi->prepare("SELECT * FROM transaction_temp WHERE id_transaction = ?");
        $stmt->bind_param("i", $id_transaction);
        $stmt->execute();
        return $stmt->get_result();
    }

    function add_transactionTemp($id_item, $quantity, $price, $amount, $session_id, $remark) {
        $stmt = $this->koneksi->prepare("INSERT INTO transaction_temp (id_item, quantity, price, amount, session_id, remark) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiddss", $id_item, $quantity, $price, $amount, $session_id, $remark);
        return $stmt->execute();
    }

    function update_transactionTemp($id_transaction, $id_item, $quantity, $price, $amount, $session_id, $remark) {
        $stmt = $this->koneksi->prepare("UPDATE transaction_temp SET id_item=?, quantity=?, price=?, amount=?, session_id=?, remark=? WHERE id_transaction=?");
        $stmt->bind_param("iiddssi", $id_item, $quantity, $price, $amount, $session_id, $remark, $id_transaction);
        return $stmt->execute();
    }

    function delete_transactionTemp($id_transaction) {
        $stmt = $this->koneksi->prepare("DELETE FROM transaction_temp WHERE id_transaction=?");
        $stmt->bind_param("i", $id_transaction);
        return $stmt->execute();
    }

    
    // ==================== Get Koneksi (Optional) ====================
    function getKoneksi() {
        return $this->koneksi;
    }
}

?>
