<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Customer</h1>
    <p class="mb-4">Form untuk menambahkan data customer baru ke sistem Koperasi.</p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Customer</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" id="formCustomer">
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" name="nama_customer" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="text" class="form-control" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="simpanCustomer">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>
