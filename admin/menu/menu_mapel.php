<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Mata Pelajaran</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM mapel WHERE id_mapel=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['id_mapel'] 	="";
		$tampil1['nip']		 	="--pilih--";
		$tampil1['nama_mapel'] 	="";
		$tampil1['kkm'] 		="";
		$tampil1['jenis_mapel'] ="--pilih--";
		$act					= "tambah";
	}
?>			
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Mata Pelajaran</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=mapel&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
				  <div class="form-group">
                    <label>Nip</label>
                    <input type="hidden" class="form-control" id="id_mapel" name="id_mapel" value="<?php echo $tampil1['id_mapel']; ?>" >
					<input type="hidden" class="form-control" id="nama_mapel1" name="nama_mapel1" value="<?php echo $tampil1['nama_mapel']; ?>"  >
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
                    <label>Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?php echo $tampil1['nama_mapel']; ?>" placeholder="Enter Nama Mata Pelajaran..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>KKM</label>
                    <input type="text" class="form-control" id="kkm" name="kkm" value="<?php echo $tampil1['kkm']; ?>" placeholder="Enter KKM..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Jenis Mata Pelajaran</label>
                    <select class="form-control select2" id="jenis_mapel" name="jenis_mapel" value="<?php echo $tampil1['jenis_mapel']; ?>" style="width: 100%;" required="">
                      <option selected value="<?php echo "$tampil1[jenis_mapel]"; ?>"><?php echo "$tampil1[jenis_mapel]"; ?></option>
                      <option value="wajib">Wajib</option>
                      <option value="lokal">Muatan Lokal</option>
                    </select>
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
	$ambil	= mysql_query("SELECT * FROM mapel p JOIN guru g ON p.nip=g.nip");
?>				
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru Pengampu</th>
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
                        <td><?php echo $tampil['nama_mapel']; ?></td>
                        <td><?php echo $tampil['nama_guru']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=mapel&id=<?php echo $tampil['id_mapel']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
						<a href="./aksi.php?menu=mapel&act=hapus&id=<?php echo $tampil['id_mapel']; ?>"><button  class="btn btn-warning">Delete</button></a>
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
                        <th>Mata Pelajaran</th>
                        <th>Guru Pengampu</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->