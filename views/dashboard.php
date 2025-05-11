<?php
include '../controllers/auth.php';
require_login();
include '../controllers/product.php';
$data = get_all_products();

if (isset($_GET['delete'])) {
    delete_product($_GET['delete']);
    header("Location: dashboard.php");
    exit;
}
?>

<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div><i class="fas fa-table me-1"></i>Produk</div>
                <a href="product_add.php" class="btn btn-primary btn-sm">+ Tambah Produk</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $data->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['stock'] ?></td>
                                <td>
                                    <a href="product_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="dashboard.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>