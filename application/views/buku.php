<div class="container-fluid" style="background-color:white; padding: 10px">
  <h1>Daftar Buku</h1>
  <div class="box box-success">
    <div class="box-header with-border">
      <div class="row">
        <div class="container-fluid">
          <div class="pull-right">
            <?php if ($this->session->userdata("level") == "Admin"): ?>
            <button type="submit" class="btn btn-success" name="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Buku</button>
          <?php elseif ($this->session->userdata("level") == "Kasir"): ?>
            
          <?php endif ?>
            <br>
            <br>
          </div>
        </div>
      </div>
    </div>
    <div class="box-body no-padding">
      <div class="table-responsive">
        <table class="table" id="example">
          <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tahun Terbit</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th style="text-align:center">Aksi</th>
          </tr>
          <?php
            foreach($buku as $i): ?>
          <tr>
            <td><?=$i->kode_buku;?></td>
            <td><?=$i->judul_buku;?></td>
            <td><?=$i->tahun;?></td>
            <td><?=$i->nama_kategori;?></td>
            <td><?=$i->harga;?></td>
            <td><?=$i->penerbit;?></td>
            <td><?=$i->penulis;?></td>
            <td style="text-align:center">
              <?php if ($this->session->userdata("level") == "Admin"): ?>
                  <a data-toggle="modal" data-target="#modal_edit<?= $i->kode_buku;?>" class="btn btn-info btn-sm">
                      <i class="fa fa-pencil"></i>Ubah
                  </a>
                  <a href="<?=base_url('index.php/buku/hapus/'.$i->kode_buku)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin?')">
                      <i class="fa fa-remove"></i>Hapus
                  </a>
                <?php elseif ($this->session->userdata("level") == "Kasir"): ?>
                    Anda kasir
                <?php endif ?>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">Tambah Buku</h4>
    </div>
    <div class="modal-body">
      <form action="<?=base_url('index.php/buku/tambah')?>" method="post" class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">Kode Buku</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Kode Buku" name="kode_buku">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Judul Buku</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Judul Buku" name="judul_buku">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tahun</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Tahun" name="tahun">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Kategori</label>
          <div class="col-sm-8">
            <select class="form-control" name="kode_kategori" required>
              <option></option>
              <?php foreach ($kategori as $k): ?>
                <option value="<?=$k->kode_kategori?>">
                  <?=$k->nama_kategori ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Harga Buku" name="harga">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Penerbit</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Penerbit" name="penerbit">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Penulis</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Penulis" name="penulis">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Stok</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Stok" name="stok">
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Simpan" name="tambahdata">
      </form>
    </div>
  </div>
</div>
</div>

<?php foreach ($buku as $i): ?>
<div class="modal fade" id="modal_edit<?= $i->kode_buku;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">Ubah Buku</h4>
    </div>
    <div class="modal-body">
      <form action="<?=base_url('index.php/buku/ubah')?>" method="post" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-8">
            <input type="hidden" class="form-control" placeholder="Kode Buku" name="kode_buku" value="<?=$i->kode_buku?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Judul Buku</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Judul Buku" name="judul_buku" value="<?=$i->judul_buku?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Tahun</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Tahun" name="tahun" value="<?=$i->tahun?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Kategori</label>
          <div class="col-sm-8">
            <select class="form-control" name="kode_kategori" required value="<?=$i->kode_kategori?>">
              <option></option>
              <?php foreach ($kategori as $k): ?>
                <option value="<?=$k->kode_kategori?>">
                  <?=$k->nama_kategori ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Harga Buku" name="harga" value="<?=$i->harga?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Penerbit</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Penerbit" name="penerbit" value="<?=$i->penerbit?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Penulis</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Penulis" name="penulis" value="<?=$i->penulis?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Stok</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Stok" name="stok" value="<?=$i->stok?>">
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Ubah" name="ubahdata">
      </form>
    </div>
  </div>
</div>
</div>
<?php endforeach ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });

</script>
