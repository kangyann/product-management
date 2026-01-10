<?php
$totalProductActive = 0;
$totalProductNonActive = 0;
foreach ($categories as $category) {
    $productActive = 0;
    $productNonActive = 0;
    foreach ($category['products'] as $product) {
        if ($product['status']) {
            $productActive += 1;
        } else {
            $productNonActive += 1;
        }
    }
    $totalProductActive += $productActive;
    $totalProductNonActive += $productNonActive;
}
?>
<div class="container my-4">
    <div class="row g-3">
        <!-- Login As -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Login as</small>
                    <h6 class="fw-bold mb-0">
                        <?= $users['username'] ?? '-' ?>
                    </h6>
                </div>
            </div>
        </div>

        <!-- IP Address -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">IP Address</small>
                    <h6 class="fw-bold mb-0">
                        <?= $_SERVER['REMOTE_ADDR'] ?>
                    </h6>
                </div>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Total Produk Aktif</small>
                    <h6 class="fw-bold mb-0">
                        <?= $totalProductActive ?>
                    </h6>
                </div>
            </div>
        </div>
        <!-- Total Produk -->
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Total Produk Tidak Aktif</small>
                    <h6 class="fw-bold mb-0">
                        <?= $totalProductNonActive ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <small class="text-muted">Total Kategori</small>
                    <h6 class="fw-bold mb-0">
                        <?= count($categories) ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="d-flex  flex-col mb-4">
            <h4 class="fw-bold m-0">List Kategori</h4>
            <?php foreach ($categories as $category): ?>
                <div class="d-flex align-items-center gap-2">
                    <div class="py-1 px-2 bg-secondary text-white mt-1" style="font-size: 12px;">
                        <?= $category["category_name"] ?>
                    </div>
                    <img id="actionCategoryEdit"
                        data-category="<?= htmlspecialchars($category['category_name']) ?>"
                        data-id="<?= $category['id'] ?>"
                        src="/assets/images/icons/pen.svg" style="cursor: pointer;" alt="change_icons" width="18" height="18" data-bs-toggle="modal" data-bs-target="#updateCategory">
                    <img id="actionCategoryRemove"
                        data-id="<?= $category['id'] ?>"
                        src="/assets/images/icons/trash.svg" style="cursor: pointer;" alt="change_icons" width="18" height="18" data-bs-toggle="modal" data-bs-target="#deleteCategory">
                </div>
            <?php endforeach ?>
        </div>
        <!--  -->
        <div class="mb-4 d-flex align-items-center justify-between">
            <h4 class="fw-bold">Rincian Produk</h4>
            <div class="">
                <button class="btn btn-primary" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#addProduct">Tambah Produk</button>
                <button class="btn btn-primary" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#addCategory">Tambah Kategori</button>
            </div>
        </div>
        <?php if (isset($_SESSION['flash'])): ?>
            <div class="alert <?= $_SESSION['flash']["status"] == 200 ? "alert-success" : "alert-danger" ?>">
                <?= $_SESSION['flash']["message"]; ?>
            </div>
        <?php unset($_SESSION['flash']);
        endif; ?>

        <?php include "views/partials/category-add-modal.php"; ?>
        <?php include "views/partials/category-delete-modal.php"; ?>
        <?php include "views/partials/category-update-modal.php"; ?>
        <?php include "views/partials/product-add-modal.php"; ?>
        <?php include "views/partials/product-update-modal.php"; ?>
        <?php include "views/partials/product-delete-modal.php"; ?>

        <?php foreach ($categories as $category): ?>

            <div class="card mb-4 shadow-sm">
                <div class="card-header text-center text-success">
                    - <?= $category['category_name'] ?> -
                </div>

                <div class="card-body p-0 overflow-x-auto">
                    <table class="table table-hover text-sm mb-0 align-middle text-nowrap">
                        <colgroup>
                            <col style="width:40%">
                            <col style="width:10%">
                            <col style="width:15%">
                            <col style="width:10%">
                            <col style="width:10%">
                        </colgroup>
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th class="text-start">Harga</th>
                                <th class="text-start">Kode Produk</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($category['products'] as $product): ?>
                                <tr>
                                    <td><?= $product['product_name'] ?></td>
                                    <td class="text-start">Rp <?= number_format($product['price'], 0, ',', '.') ?></td>
                                    <td class="text-start"><?= $product["product_code"] ?></td>
                                    <td class="text-center"><?= $product['stock'] ?></td>
                                    <td class="text-center">
                                        <p class=" <?= $product["status"] ? "bg-success" : "bg-danger" ?> m-auto px-3 text-white" style="width: fit-content;">
                                            <?= $product["status"] ? "Aktif" : "Tidak Aktif" ?>
                                        </p>
                                    </td>
                                    <td class="text-center" style="cursor: pointer;">
                                        <img id="actionProductsEdit"
                                            data-id="<?= $product['id'] ?>"
                                            data-name="<?= htmlspecialchars($product['product_name']) ?>"
                                            data-description="<?= htmlspecialchars($product['product_description']) ?>"
                                            data-code="<?= htmlspecialchars($product['product_code']) ?>"
                                            data-price="<?= $product['price'] ?>"
                                            data-stock="<?= $product['stock'] ?>"
                                            data-category="<?= $product['category_id'] ?>"
                                            src="/assets/images/icons/pen.svg" alt="change_icons" width="24" height="24" data-bs-toggle="modal" data-bs-target="#updateProduct">
                                        <img id="actionProductsRemove"
                                            data-id="<?= $product['id'] ?>"
                                            src="/assets/images/icons/trash.svg" alt="change_icons" width="24" height="24" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    <script>
        document.querySelectorAll('#actionProductsEdit').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('update-product-id').value = this.dataset.id;
                document.getElementById('update-product-name').value = this.dataset.name;
                document.getElementById('update-product-description').value = this.dataset.description;
                document.getElementById('update-product-code').value = this.dataset.code;
                document.getElementById('update-product-price').value = this.dataset.price;
                document.getElementById('update-product-stock').value = this.dataset.stock;
                document.getElementById('update-product-category').value = this.dataset.category;
            });
        });
        document.querySelectorAll('#actionProductsRemove').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('delete-product-id').value = this.dataset.id;
            });
        });
        document.querySelectorAll('#actionCategoryEdit').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('update-category-id').value = this.dataset.id;
                document.getElementById('update-category-name').value = this.dataset.category;
            });
        });
        document.querySelectorAll('#actionCategoryRemove').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('delete-category-id').value = this.dataset.id;
            });
        });
    </script>
</div>