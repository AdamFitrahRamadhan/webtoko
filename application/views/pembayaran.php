<div class="container-fluid" style="background-color: white">
  <h1 style="text-align:center">Nota Pembayaran</h1>
  <div class="box box-success">
    <div class="row">
      <div class="col-md-3">ID Transaksi</div>
      <div class="col-md-9">
        <?= $nota->kode_transaksi?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">Nama Pembeli</div>
      <div class="col-md-9">
        <?= $nota->nama_pembeli?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">Tanggal Beli</div>
      <div class="col-md-9">
        <?= $nota->tgl_beli?>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Detail Pembelian</div>
      <div class="col-md-9">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table"  border="1" style="border-collapse: collapse;">
        <tr>
          <th>ID Buku</th>
          <th>Judul Buku</th>
          <th>Kategori</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
        <?php foreach ($this->transaksi->get_nota($nota->kode_transaksi) as $i): ?>
      		<tr>
      		    <td><?=$i->kode_buku?></td>
              <td><?=$i->judul_buku?></td>
              <td><?=$i->nama_kategori?></td>
              <td><?=$i->jumlah?></td>
              <td><?= "Rp. ".number_format($i->harga)?></td>
              <td><?= "Rp. ".number_format(($i->harga*$i->jumlah))?></td>
      	 </tr>
      	<?php endforeach ?>
        <tr>
          <td colspan="5">Total Harga</td>
          <td><?= "Rp. ".number_format($nota->total)?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
	 window.print();
	 location.href="<?=base_url('index.php/transaksi/pesanan')?>";
</script>
