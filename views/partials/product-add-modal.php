    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductLabel">Tambah Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form action="/dashboard/products/add" method="POST">
                            <div class="d-flex flex-col mb-1">
                                <label for="productName" class="text-sm">Nama Produk</label>
                                <input type="text" class="input text-sm p-1 m-0" id="input" name="productName">
                            </div>
                            <div class="d-flex flex-col mb-1">
                                <label for="productDescription" class="text-sm">Deskripsi Produk</label>
                                <input type="text" class="input text-sm p-1 m-0" id="input" name="productDescription">
                            </div>
                            <div class="d-flex flex-col mb-1">
                                <label for="productCode" class="text-sm">SKU / Kode Produk</label>
                                <input type="text" class="input text-sm p-1 m-0" id="input" name="productCode">
                            </div>
                            <div class="d-flex flex-col mb-1">
                                <label for="price" class="text-sm">Harga</label>
                                <input type="text" class="input text-sm p-1 m-0" id="input" name="price">
                            </div>
                            <div class="d-flex flex-col mb-1">
                                <label for="stock" class="text-sm">Stok</label>
                                <input type="number" class="input text-sm p-1 m-0" id="input" name="stock">
                            </div>
                            <div class="d-flex flex-col mb-1">
                                <label for="categories" class="text-sm">Kategori</label>
                                <select name="categories" class="select text-sm p-1 m-0" id="select">
                                    <option value="0" selected>-- Pilih Kategori --</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category["id"] ?>"><?= $category["category_name"] ?></option>
                                    <?php endforeach ?>
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
    </div>