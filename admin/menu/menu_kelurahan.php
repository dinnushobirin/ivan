<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Kelurahan</small>
          </h3></center>
        </section>
<?php
        $menu = $_GET['menu'];
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT a.*,b.kecamatan_nama  FROM kelurahan a
                                 LEFT JOIN kecamatan b ON a.kelurahan_kecamatan_id = b.kecamatan_id
                                 WHERE kelurahan_id=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['kelurahan_id'] 	="";
		$tampil1['kelurahan_kecamatan_id']="";
		$tampil1['kecamatan_nama']      ="--pilih--";
		$tampil1['kelurahan_nama'] 	="";
		$tampil1['kelurahan_info']      ="";
		$act				= "tambah";
	}
?>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kelurahan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=<?php echo $menu; ?>&act=<?php echo $act; ?>">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan_nama" name="kelurahan_nama" value="<?php echo $tampil1['kelurahan_nama']; ?>" placeholder="Enter Nama Kelurahan..." required="">
                            <input type="hidden" id="kelurahan_nama1" name="kelurahan_nama1" value="<?php echo $tampil1['kelurahan_nama']; ?>" >
                            <input type="hidden" id="kelurahan_id" name="kelurahan_id" value="<?php echo $tampil1['kelurahan_id']; ?>" >
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Kecamatan</label>
                             <select class="form-control select2"  style="width: 100%;" id="kelurahan_kecamatan_id" name="kelurahan_kecamatan_id" required="">
                                <option selected value="<?php echo "$tampil1[kelurahan_kecamatan_id]"; ?>"><?php echo "$tampil1[kecamatan_nama]"; ?></option>
                                <?php 
                                  $ambilg = mysql_query("SELECT * FROM kecamatan");
                                  while($tampilg=mysql_fetch_array($ambilg)){
                                      if($tampil1['kelurahan_kecamatan_id']!==$tampilg['kecamatan_id']){
                                ?>
                                    <option value="<?php echo "$tampilg[kecamatan_id]"; ?>"><?php echo "$tampilg[kecamatan_nama] "; ?></option>
                                <?php 
                                      }
                                  }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Info</label>
                            <input type="text" class="form-control" id="kelurahan_info" name="kelurahan_info" value="<?php echo $tampil1['kelurahan_info']; ?>" placeholder="Enter Info Kelurahan..." required="">
                        </div><!-- /.form-group -->


                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-info ">Save</button>
                        </div><!-- /.box-footer -->

                </div><!-- /.col -->
              </div><!-- /.row -->
                </form>       
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kelurahan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT a.*,b.kecamatan_nama FROM kelurahan a 
                    LEFT JOIN kecamatan b ON a.kelurahan_kecamatan_id = b.kecamatan_id 
                ");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>
                        <th>Nama Kelurahan</th>
                        <th>Info</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
	$no = 1;
	while($tampil =mysql_fetch_array($ambil)){
?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tampil['kecamatan_nama']; ?></td>
                        <td><?php echo $tampil['kelurahan_nama']; ?></td>
                        <td><?php echo $tampil['kelurahan_info']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=<?php echo $menu; ?>&id=<?php echo $tampil['kelurahan_id']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
                        <a href="./aksi.php?menu=<?php echo $menu; ?>&act=hapus&id=<?php echo $tampil['kelurahan_id']; ?>" onclick="return confirm('Apakah Kamu Yakin?')"><button  class="btn btn-warning">Delete</button></a>
                        </td>
                      </tr>
<?php
	$no++;		
	}
?>                      
                    </tbody>
					<tfoot>
                      <tr>
                        <th>No</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->