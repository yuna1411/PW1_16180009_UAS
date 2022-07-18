<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('Master_barang/tambah')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Add Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>

          <?php $no = 1;
          foreach($master_barang as $mb) : ?>
          <tbody>
            <tr class="text-center">
              <td><?= $no++ ?></td>
              <td><?= $mb->id ?></td>
              <td><?= $mb->name ?></td>
              <td><?= $mb->qty ?></td>
              <td><?= $mb->price ?></td>
              <td>
                <button data-toggle="modal" data-target="#edit<?= $mb->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <a href="<?= base_url('Master_barang/delete/' . $mb->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this data?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          </tbody>
          <?php endforeach?>
        </table>
    </div>

    <!-- Modal Edit -->
    <?php foreach($master_barang as $mb){?>
    <div class="modal fade" id="edit<?= $mb->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form action="<?= base_url('Master_barang/edit/' . $mb->id) ?>" method="POST"> 
              <div class="form-group">
                  <label> ID </label>
                  <input type="text" name="id_bunga" class="form-control" value="<?= $mb->id?>">
                  <?= form_error('id_bunga', '<div class="text-small text-danger">', '</div'); ?>
              </div>
              <div class="form-group">
                  <label> Name </label>
                  <input type="text" name="nama_bunga" class="form-control" value="<?= $mb->name?>">
                  <?= form_error('nama_bunga', '<div class="text-small text-danger">', '</div'); ?>
              </div>
              <div class="form-group">
                  <label> Quantity </label>
                  <input type="text" name="qty_bunga" class="form-control" value="<?= $mb->qty?>">
                  <?= form_error('qty_bunga', '<div class="text-small text-danger">', '</div'); ?>
              </div>
              <div class="form-group">
                  <label> Price </label>
                  <input type="text" name="price_bunga" class="form-control" value="<?= $mb->price?>">
                  <?= form_error('price_bunga', '<div class="text-small text-danger">', '</div'); ?>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Save</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php } ?>
