<div class="container-fluid" style="background-color:white; padding: 10px;opacity: 0.9">
  <h1>Daftar Barang</h1>
  <div class="box box-success">
    <div class="box-header with-border">
      <div class="row">
        <div class="container-fluid">
          <div class="pull-right">
            <button type="submit" class="btn btn-success" name="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Barang</button>
            
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
            <th>no</th>
            <th>nama barang</th>
            <th>harga jual</th>
            <th>harga beli</th>
            <th>stok</th>
            <th>kategori</th>
            <th style="text-align:center">Aksi</th>
          </tr>
          <?php
            $no = 0;
            foreach($tampil_barang as $i): $no++?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$i->nama_barang;?></td>
            <td><?=$i->harga_jual;?></td>
            <td><?=$i->harga_beli;?></td>
            <td><?=$i->stok;?></td>
            <td><?=$i->kategori;?></td>
            <td style="text-align:center">
                  <a href="#edit" onclick="edit(<?=$i->kode_barang?>)" class="btn btn-info" data-toggle="modal">Ubah</a>
                 <a href="<?=base_url('index.php/barang/hapus/'.$i->kode_barang)?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
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
      <form action="<?=base_url('index.php/barang/tambah_barang')?>" method="post" class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">Nama Barang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga Jual</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Harga Jual" name="harga_jual">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga Beli</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Harga Beli" name="harga_beli">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Stok</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" placeholder="Stok" name="stok">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Kategori</label>
          <div class="col-sm-8">
            <select class="form-control" name="kategori" required>
              <option></option>
                <option value="sepatu">sepatu</option>
                <option value="mobil">mobil</option>
            </select>
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title" id="myModalLabel">Ubah Buku</h4>
    </div>
    <div class="modal-body">
      <form action="<?=base_url('index.php/barang/ubah')?>" method="post" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-8">
            <input type="hidden" class="form-control" name="kode_barang" id="kode_barang">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Nama Barang</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="nama_barang" id="nama_barang">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga Jual</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="harga_jual" id="harga_jual">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Harga_beli</label>
          <div class="col-sm-8">
            <input type="text" class="form-control"  name="harga_beli" id="harga_beli">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Stok</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="stok" id="stok">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Kategori</label>
          <div class="col-sm-8">
            <select class="form-control" name="kategori" id="kategori">
              <option></option>
                <option value="sepatu">sepatu</option>
                <option value="mobil">mobil</option>
            </select>
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
<script type="text/javascript">
    function edit(a) {
        $.ajax({
            type:"post",
            url:"<?=base_url()?>index.php/barang/edit_barang/"+a,
            dataType:"json",
            success:function(data){
                $("#kode_barang").val(data.kode_barang);
                $("#nama_barang").val(data.nama_barang);
                $("#harga_jual").val(data.harga_jual);
                $("#harga_beli").val(data.harga_beli);
                $("#stok").val(data.stok);
                $("#kategori").val(data.kategori);
            }
        });
    }
</script>