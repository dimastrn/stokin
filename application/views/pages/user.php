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
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>                    
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody> 
    
                  <?php if(!empty($record)): ?>
                    <?php foreach($record as $row): ?>
                      <tr> 
                        <td><b><?php echo $row['id_admin']; ?></b></td>
                        <td><b><?php echo $row['username']; ?></b></td>
                        <td><b><?php echo $row['password']; ?></b></td>                        
                        <td>                          
                          <?php if($row['status'] == 'aktif' ): ?>
                            <span class="badge badge-primary">AKTIF</span>
                          <?php else: ?> 
                            <span class="badge badge-danger">TIDAK AKTIF</span>
                          <?php endif; ?>                            
                        </td>  
                        <td>
                          <a href="<?php echo base_url(''); ?>" style="color: #fff;">
                            <button class="btn btn-icon btn-2 btn-primary" type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                <span class="btn-inner--icon" ><i class="ni ni-ruler-pencil"></i></span>
                            </button>
                          </a>
                          <a href="<?php echo base_url(''); ?>" style="color: #fff;">
                            <button class="btn btn-icon btn-2 btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Delete">
                                <span class="btn-inner--icon" ><i class="ni ni-fat-delete"></i></span>                            
                            </button>
                          </a>
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
        <form action="<?php echo base_url('user/register') ?>" method="post" enctype="multipart/form-data">          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" placeholder="Username" class="form-control form-control-alternative" name="username" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="password" placeholder="Password" class="form-control form-control-alternative" name="password" required/>
              </div>
            </div>
          </div>                           
          <div class="row">            
            <div class="col-md-12">
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
