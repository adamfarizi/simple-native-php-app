<?php
include '../controllers/auth.php';
require_login();
require_admin();
include '../controllers/product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    add_product($_POST['name'], $_POST['price'], $_POST['stock']);
    header("Location: dashboard.php");
}
?>
<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
            <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php' ?>