<!--  -->
<div class="modal fade" id="deleteProduct" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProductLabel">Hapus Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center d-flex flex-col align-items-center">
                    <img src="/assets/images/icons/triangel-warning.svg" alt="" width="64">
                    <h6 class="fs-5">Yakin ingin menghapus produk ini ?</h6>
                    <small class="text-danger">Note: Data yang dihapus akan hilang.</small>
                    <form action="/dashboard/products/delete" method="POST" style="width: 100%;">
                        <input type="hidden" name="id" id="delete-product-id">
                        <div class="mt-3 d-flex align-items-center justify-center gap-2">
                            <button type="submit" class="btn btn-danger" style="flex: 1;" data-bs-dismiss="modal" style="font-size: 12px;">Hapus</button>
                            <button type="button" class="btn btn-secondary" style="flex: 1;" data-bs-dismiss="modal" style="font-size: 12px;">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</div>