<div class="container-fluid" style="background-color:white; padding: 10px;opacity: 0.9">
  <h1>Transaksi</h1>
  <div class="box box-success">
    <div class="box-header with-border">
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box-body no-padding">
          <div class="table-responsive">
            <table class="table" id="example">
              <tr>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th style="text-align:center">Aksi</th>
              </tr>
              <?php
                foreach($tampil_barang as $i): ?>
              <tr>
                <td><?=$i->nama_barang;?></td>
                <td><?=$i->harga_jual;?></td>
                <td><?=$i->harga_beli;?></td>
                <td><?=$i->stok;?></td>
                <td><?=$i->kategori;?></td>
                <td style="text-align:center">
                    <a href="<?=base_url('index.php/transaksi/tambah/'.$i->kode_barang)?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-shopping-cart"></i> Pesan
                    </a>
                </td>
              </tr>
              <?php endforeach;?>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="table-responsive">
          <form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
            <table class="table">
              <tr>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
              <?php
              foreach ($this->cart->contents() as $items) {
              ?>
              <tr>
                <td>
                  <input type="hidden" name="kode_buku[]" value="<?=$items['id']?>">
                  <input type="hidden" name="qty[]" value="<?=$items['qty']?>">
                  <?=$items['id']?></td>
                <td><?=$items['name']?></td>
                <td><?=$items['options']['Genre']?></td>
                <td><?=$items['qty']?></td>
                <td><?=$items['price']?></td>
                <td><?=$items['subtotal']?></td>
                <td>
                  <a href="<?=base_url('index.php/transaksi/hapus_item/'.$items['rowid'])?>" onclick="return confirm('Apakah yakin?')" class="btn btn-danger">
                    <i class="fa fa-remove"></i>
                  </a>
                </td>
              </tr>
              <?php }?>
              <tr>
                <input type="hidden" name="total" value="<?=$this->cart->total()?>">
                <td colspan="5">Total</td>
                <td><?=$this->cart->total()?></td>
              </tr>
            </table>
            <div class="form-group">
              <label class="col-sm-4">Nama pembeli :</label>
              <div class="col-sm-8">
                <input type="text" name="nama_konsumen" placeholder="Nama Pembeli" class="form-control" required>
              </div>
              <!-- <div class="form-group">
              <label class="col-sm-4">Alamat:</label>
              <div class="col-sm-8">
                <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
              </div> -->
              <br>
            </div>
            </div>
                <input type="submit" name="simpan" value="Bayar" class="btn btn-success" onclick="return confirm('Apakah yakin?')">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
