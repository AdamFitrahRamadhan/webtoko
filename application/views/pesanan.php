<div class="container-fluid" style="background-color: white">
  <h1>Daftar Pesanan</h1>
  <div class="box box-success">
    <div class="table-responsive">
      <table class="table">
        <tr>
          <th>No Nota</th>
          <th>Nama Pembeli</th>
          <th>Tanggal Beli</th>
          <th>Total</th>
          <th>Detail</th>

        </tr>
        <?php
        foreach ($pesanan as $psn): ?>
          <tr>
            <td><?=$psn->kode_transaksi?></td>
            <td><?=$psn->nama_pembeli?></td>
            <td><?=$psn->tgl_beli?></td>
            <td><?="Rp. ".number_format($psn->total)?></td>
            <td><a data-toggle="modal" data-target="#modaldet<?= $psn->kode_transaksi;?>" style="text-decoration:none" class="btn btn-info">Lihat Barang</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php foreach ($pesanan as $psn): ?>
<div class="modal fade" id="modaldet<?=$psn->kode_transaksi?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Detail Barang yang dipesan <?=$psn->nama_pembeli?></h4>
      </div>
      <div class="modal-body">

        <?php foreach ($this->transaksi->get_nota($psn->kode_transaksi) as $i): ?>
          <table class="table table-hover table-striped">
            <div class="row">
              <div class="col-md-3">ID Buku</div>
              <div class="col-md-9"><?=$i->kode_buku?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Judul Buku</div>
              <div class="col-md-9"><?=$i->judul_buku?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Kategori</div>
              <div class="col-md-9"><?=$i->nama_kategori?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Jumlah</div>
              <div class="col-md-9"><?=$i->jumlah?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Harga</div>
              <div class="col-md-9"><?="Rp. ".number_format($i->harga)?></div>
            </div>
            <div class="row">
              <div class="col-md-3">Total</div>
              <div class="col-md-9"><?= "Rp. ".number_format(($i->harga*$i->jumlah))?></div>
            </div>
          </table>
          <br>
        <?php endforeach ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php endforeach ?>
