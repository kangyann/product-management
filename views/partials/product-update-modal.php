<!--  -->
<div class="modal fade " id="updateProduct" tabindex="-1" aria-labelledby="updateProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateProductLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <form action="/dashboard/products/update" method="POST">
                        <input type="hidden" name="id" id="update-product-id">
                        <div class="d-flex flex-col mb-1">
                            <label for="productName" class="text-sm">Nama Produk</label>
                            <input type="text" class="input text-sm p-1 m-0" id="update-product-name" name="productName">
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="productDescription" class="text-sm">Deskripsi Produk</label>
                            <input type="text" class="input text-sm p-1 m-0" id="update-product-description" name="productDescription">
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="productCode" class="text-sm">SKU / Kode Produk</label>
                            <input type="text" class="input text-sm p-1 m-0" id="update-product-code" name="productCode">
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="price" class="text-sm">Harga</label>
                            <input type="text" class="input text-sm p-1 m-0" id="update-product-price" name="price">
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="stock" class="text-sm">Stok</label>
                            <input type="number" class="input text-sm p-1 m-0" id="update-product-stock" name="stock">
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="categories" class="text-sm">Kategori</label>
                            <select name="categories" class="select text-sm p-1 m-0" id="update-product-category">
                                <option value="0" selected>-- Pilih Kategori --</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="d-flex flex-col mb-1">
                            <label for="status" class="text-sm">Status</label>
                            <select name="status" class="select text-sm p-1 m-0">
                                <option value="1" selected>Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="mt-3 d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" style="font-size: 12px;">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-size: 12px;">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</div>