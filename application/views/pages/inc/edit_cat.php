<?php get_template("header"); ?>

<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">              
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0" style="text-transform: uppercase;">Edit Category</h3>
            </div>
            <div class="col-4 text-right">
              <a href="<?php echo base_url('stock/category/').$record->kategori; ?>" class="btn btn-sm btn-danger">Kembali</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('stock/update_stock') ?>">
            <h6 class="heading-small text-muted mb-4">Category information</h6>
            <div class="pl-lg-4">
              <div class="row">                      
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="nama">Nama Barang</label>
                    <input type="number" id="id-siswa" class="form-control form-control-alternative" name="id_barang" value="<?php echo $record->id_barang; ?>" hidden>
                    <input type="text" id="nama" class="form-control form-control-alternative" name="nama_barang" value="<?php echo $record->nama_barang; ?>">
                  </div>
                </div>                	
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="nama">Suppliers</label>                    
                    <input type="text" id="nama" class="form-control form-control-alternative" name="supplier" value="<?php echo $record->supplier; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Tanggal Expired</label>                    
                    <input type="text" class="form-control form-control-alternative datepicker" name="tgl_expired" data-toggle="tooltip" data-placement="top" title="Expired" value="<?php echo $record->tgl_expired; ?>" required/>
                  </div>
                </div>               
              </div>

              <div class="row">              
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="nama">Jumlah Stok</label>                    
                    <input type="number" id="nama" class="form-control form-control-alternative" name="stok" value="<?php echo $record->stok; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label">Status</label>                    
                    <select class="form-control form-control-alternative" name="status">
                      <option>Pilih Status</option>           
                      <option value="aktif">Aktif</option>                      
                      <option value="tidak">Tidak Aktif</option>                        
                    </select>
                  </div>                                
                </div>  
              </div>

              <div class="row">
                <a href="<?php echo base_url('stock/update_stock'); ?>" style="width: 99%">
                	<button class="btn btn-icon btn-block btn-3 btn-primary" type="submit">                  
          					<span class="btn-inner--icon"><i class="ni ni-send"></i></span>					
          				  <span class="btn-inner--text">Update</span>				    
          				</button>
                </a>
              </div>
            </div>         
          </form>
        </div>	
      </div>
    </div>
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            © 2018 Made By <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Adimas Sastra Nugraha</a>
          </div>
        </div>          
      </div>
    </footer> 
  </div>

<?php get_template("footer"); ?>