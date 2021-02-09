<div class="market-updates">
  <div class="col-md-3 market-update-gd">
    <div class="market-update-block clr-block-2">
      <div class="col-md-4 market-update-right">
        <i class="fa fa-eye"> </i>
      </div>
       <div class="col-md-8 market-update-left">
       <h4>Visitors</h4>
      <h3>13,500</h3>
      <p>Other hand, we denounce</p>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <div class="col-md-3 market-update-gd">
    <div class="market-update-block clr-block-1">
      <div class="col-md-4 market-update-right">
        <i class="fa fa-users" ></i>
      </div>
      <div class="col-md-8 market-update-left">
      <h4>Users</h4>
        <h3>1,250</h3>
        <p>Other hand, we denounce</p>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <div class="col-md-3 market-update-gd">
    <div class="market-update-block clr-block-3">
      <div class="col-md-4 market-update-right">
        <i class="fa fa-usd"></i>
      </div>
      <div class="col-md-8 market-update-left">
        <h4>Sales</h4>
        <h3>1,500</h3>
        <p>Other hand, we denounce</p>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
  <div class="col-md-3 market-update-gd">
    <div class="market-update-block clr-block-4">
      <div class="col-md-4 market-update-right">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
      </div>
      <div class="col-md-8 market-update-left">
        <h4>Orders</h4>
        <h3>1,500</h3>
        <p>Other hand, we denounce</p>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
   <div class="clearfix"> </div>
</div>
<div class="box-body no-padding" style="background: white;opacity: 0.9">
      <div class="table-responsive">
        <table class="table" id="example">
          <tr>
            <th>no</th>
            <th>nama barang</th>
            <th>harga jual</th>
            <th>harga beli</th>
            <th>stok</th>
            <th>kategori</th>
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
                      </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
