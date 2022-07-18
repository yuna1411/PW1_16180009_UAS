<form action="<?= base_url('Master_barang/tambah_action') ?>" method="POST"> 
    <div class="form-group">
        <label> ID </label>
        <input type="text" name="id_bunga" class="form-control">
        <?= form_error('id_bunga', '<div class="text-small text-danger">', '</div'); ?>
    </div>
    <div class="form-group">
        <label> Name </label>
        <input type="text" name="nama_bunga" class="form-control">
        <?= form_error('nama_bunga', '<div class="text-small text-danger">', '</div'); ?>
    </div>
    <div class="form-group">
        <label> Quantity </label>
        <input type="text" name="qty_bunga" class="form-control">
        <?= form_error('qty_bunga', '<div class="text-small text-danger">', '</div'); ?>
    </div>
    <div class="form-group">
        <label> Price </label>
        <input type="text" name="price_bunga" class="form-control">
        <?= form_error('price_bunga', '<div class="text-small text-danger">', '</div'); ?>
    </div>

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Save</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Cancel</button>
</form>