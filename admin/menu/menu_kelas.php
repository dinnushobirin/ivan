<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Kelas</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM kelas WHERE id_kelas=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['id_kelas'] 	="";
		$tampil1['nip']		 	="--pilih--";
		$tampil1['nama_kelas'] 	="";
		$act					= "tambah";
	}
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kelas</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=kelas&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
				  <div class="form-group">
                    <label>Nip</label>
                    <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $tampil1['id_kelas']; ?>" >
					<input type="hidden" class="form-control" id="nama_kelas1" name="nama_kelas1" value="<?php echo $tampil1['nama_kelas']; ?>"  >
					<select class="form-control select2"  style="width: 100%;" id="nip" name="nip" required="">
                      <option selected value="<?php echo "$tampil1[nip]"; ?>"><?php echo "$tampil1[nip]"; ?></option>
        <?php 
			$ambilg = mysql_query("SELECT * FROM guru");
			while($tampilg=mysql_fetch_array($ambilg)){
		 ?>
		              <option value="<?php echo "$tampilg[nip]"; ?>"><?php echo "$tampilg[nip] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $tampil1['nama_kelas']; ?>" placeholder="Enter Nama Kelas..." required="">
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
              <h3 class="box-title">Data Guru</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT * FROM kelas k JOIN guru g ON k.nip=g.nip");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Guru Wali</th>
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
                        <td><?php echo $tampil['nama_kelas']; ?></td>
                        <td><?php echo $tampil['nama_guru']; ?></td>
                        <td>
                   		<a href="tampil.php?menu=kelas&id=<?php echo $tampil['id_kelas']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
						<a href="./aksi.php?menu=kelas&act=hapus&id=<?php echo $tampil['id_kelas']; ?>"><button  class="btn btn-warning">Delete</button></a>						
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
                        <th>Nama Kelas</th>
                        <th>Guru Wali</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->