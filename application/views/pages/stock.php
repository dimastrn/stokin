<?php get_template("header"); ?>

<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">        
  		<button class="btn btn-icon btn-3 btn-warning" type="button" data-toggle="modal" data-target="#modal-form">
  			<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
  		  <span class="btn-inner--text">Tambah Data</span>
  		</button>         
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--7">
	<div class="row">
		<div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0" style="text-transform: uppercase;">Stock Tables</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                  <tr>                    
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Expired</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th> 
                    <th scope="col">Action</th>   
                        
                  </tr>
                </thead>
                <tbody> 
    
                  <?php if(!empty($record)): ?>
                    <?php foreach ($record as $row): ?>
                      <tr> 
                        <td><b><?php echo $row['nama_kategori'] ?></b></td>
                        <td><b><?php echo $row['nama_barang'] ?></b></td>
                        <td><b><?php echo $row['supplier'] ?></b></td>
                        <td><img src="<?php echo $row['foto'] ?>" class="img-fluid rounded shadow-lg" width="60"></td>
                        <td><b><?php echo $row['tgl_expired'] ?></b></td>
                        <td><b><?php echo $row['stok'] ?></b></td>
                        <td>
                          <?php if ($row['status'] == 'aktif'): ?>
                            <span class="badge badge-primary">AKTIF</span>
                          <?php elseif($row['status'] == 'tidak'): ?>
                            <span class="badge badge-danger">TIDAK AKTIF</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('stock/edit_stock/').$row['id_barang']; ?>" style="color: #fff;">
                            <button class="btn btn-icon btn-2 btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                <span class="btn-inner--icon" ><i class="ni ni-ruler-pencil"></i></span>
                            </button>
                          </a>
                          <form action="<?php echo base_url('stock/delete_stock')?>" method="post" style="display: inline;">
                            <input type="text" name="id_barang" value="<?php echo $row['id_barang']; ?>" style="visibility: hidden; position: fixed;">
                            <input type="text" name="id_kategori" value="<?php echo $row['id_kategori']; ?>" style="visibility: hidden; position: fixed;">
                            <button class="btn btn-icon btn-2 btn-danger" type="input" data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="btn-inner--icon" ><i class="ni ni-fat-delete"></i></span>                            
                            </button>
                          </form>
                        </td>
                      </tr>                          
                    <?php endforeach; ?>                  
                  <?php endif; ?>                  

                         
                </tbody>
              </table>
            </div>            
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

<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('stock/add_stock/add') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">                                
                <select class="form-control form-control-alternative" name="kategori">                  
                  <?php foreach ($option as $key): ?>
                    <option value="<?php echo $key['id_kategori'] ?>"><?php echo $key['nama_kategori'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>            
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" placeholder="Nama Barang" class="form-control form-control-alternative" name="nama_barang" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" placeholder="Supplier" class="form-control form-control-alternative" name="supplier" required/>
              </div>
            </div>
          </div>          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="date" class="form-control form-control-alternative" name="tgl_expired" data-toggle="tooltip" data-placement="top" title="Expired" required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="file" class="form-control form-control-alternative" name="userfile" data-toggle="tooltip" data-placement="top" title="Upload Foto" required/>
              </div>
            </div>
          </div>         
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="number" min="1" max="999" placeholder="Stok" class="form-control form-control-alternative" name="stok" required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control form-control-alternative" name="status">
                  <option>Pilih Status</option>
                  <option value="1">Aktif</option>
                  <option value="2">Tidak</option>                      
                </select>
              </div>
            </div>
          </div>              
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php get_template("footer"); ?>