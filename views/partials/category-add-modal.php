    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCategoryLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form action="/dashboard/category/add" method="POST">
                            <div class="d-flex flex-col mb-1">
                                <label for="categoryName" class="text-sm">Nama Kategori</label>
                                <input type="text" class="input text-sm p-1 m-0" id="input" name="categoryName">
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