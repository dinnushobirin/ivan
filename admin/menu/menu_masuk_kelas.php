<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Masuk Kelas</small>
          </h3></center>
        </section>

<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM nilai n JOIN siswa s JOIN kelas k ON n.nis=s.nis AND n.id_kelas=k.id_kelas WHERE n.id_nilai=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Kelas Siswa</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="./aksi.php?menu=masuk_kelas&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
				  <div class="form-group">
                    <label>Nis Nama</label>
                    <input type="hidden" class="form-control" id="id_nilai" name="id_nilai" value="<?php echo "$tampil1[id_nilai]"; ?>"  >
					<input type="text" class="form-control"  value="<?php echo "$tampil1[nis] | $tampil1[nama_lengkap]"; ?>" disabled="" >
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Pilih Kelas</label>
                    <select class="form-control select2"  style="width: 100%;" id="id_kelas" name="id_kelas" required="" >
                      <option selected value="<?php echo $tampil1['id_kelas']; ?>"><?php echo $tampil1['nama_kelas']; ?></option>
          <?php 
			$ambilg	= mysql_query("SELECT * FROM kelas k JOIN guru g ON k.nip=g.nip");
			while($tampilg=mysql_fetch_array($ambilg)){
		 ?>
		              <option value="<?php echo "$tampilg[id_kelas]"; ?>"><?php echo "$tampilg[nama_kelas] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
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
<?php
	}
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
			<form role="form"action='./aksi.php?menu=masuk_kelas&act=tambah' method="POST" enctype='multipart/form-data'>		  
            <div class="box-header with-border">
              <h3 class="box-title">Data Siswa Yang Belum Masuk Kelas</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			
<?php
	$ambil	= mysql_query("SELECT * FROM siswa ");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
						<th>Pilih</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
	$no = 1;
	while($tampil =mysql_fetch_array($ambil)){
		
		$ambiln		= mysql_query("SELECT id_nilai,nis FROM nilai WHERE id_semester_tahun='$id_semester_tahun' AND nis='$tampil[nis]'");
		$tampiln	= mysql_fetch_array($ambiln);
		
		if(!$tampil['nis']==$tampiln['nis']){
			
		
		
?>
                      <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $tampil['nis']; ?></td>
                        <td><input type="checkbox" name="nis[]" id="nis[]" value="<?php echo $tampil['nis']; ?>"></td>
						<td><?php echo $tampil['nama_lengkap']; ?></td>
						<td><?php echo $tampil['alamat_siswa']; ?></td>
                      </tr>
<?php
		$no++;		
		}
	}
?>                      
                    </tbody>
					<tfoot>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
						<th>Pilih</th>
                        <th>Nama Siswa</th>
                        <th>Alamat</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            <div class="box-footer">
				 <div class="col-md-4">
				  <div class="form-group">
                    <label>Masuk Kelas</label>
                    <select class="form-control select2"  style="width: 100%;" id="id_kelas" name="id_kelas" required="">
                      <option selected value="">--pilih--</option>
        <?php 
			$ambilg = mysql_query("SELECT * FROM kelas k JOIN guru g ON k.nip=g.nip");
			while($tampilg=mysql_fetch_array($ambilg)){
		 ?>
		              <option value="<?php echo "$tampilg[id_kelas]"; ?>"><?php echo "$tampilg[nama_kelas] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
                    </select>
                  </div><!-- /.form-group -->
				  </div>
				 <div class="col-md-4">
                    <button type="reset" class="btn btn-default ">Reset</button>
                    <button type="submit" class="btn btn-info ">Save</button>
            	 </div><!-- /.box-footer -->
				</div>
				</form>	
          </div><!-- /.box -->
        </section><!-- /.content -->

 <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kelas Siswa
			<form role="form"action='tampil.php?menu=masuk_kelas' method="POST" >		  
<?php
	if(!empty($_POST['id_kelas'])){
		$ambilk	= mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[id_kelas]' ");
		$tampilk=mysql_fetch_array($ambilk);
		
	}
	else{
		$tampilk['nama_kelas'] 	= "--pilih--";
	}
?>		
			  <select class="form-control select2"  style="width: 100%;" id="id_kelas" name="id_kelas" onChange='this.form.submit()'>
                      <option selected value=""><?php echo $tampilk['nama_kelas']; ?></option>
        <?php 
			$ambilg	= mysql_query("SELECT * FROM kelas k JOIN guru g ON k.nip=g.nip");
			while($tampilg=mysql_fetch_array($ambilg)){
		 ?>
		              <option value="<?php echo "$tampilg[id_kelas]"; ?>"><?php echo "$tampilg[nama_kelas] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
                    </select>
			</form>
			  </h3>
			  		
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			
<?php
	if(!empty($_POST['id_kelas'])){
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis WHERE id_kelas='$_POST[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");
		
	
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
	$no = 1;
	while($tampil =mysql_fetch_array($ambil)){
		
?>
                      <tr>
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo $tampil['nis']; ?></td>
                        <td><?php echo $tampil['nama_lengkap']; ?></td>
						<td><?php echo $tampil['id_kelas']; ?></td>
						<td><a href="tampil.php?menu=masuk_kelas&id=<?php echo $tampil['id_nilai']; ?>"><button  class="btn btn-primary">Edit</button></a></td>
                      </tr>
<?php
		$no++;		
		
	}
?>                      
                    </tbody>
					<tfoot>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
						<th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
<?php
	}
?>           
		    </div><!-- /.box-body -->
            <div class="box-footer">
				 
				</div>	
          </div><!-- /.box -->
        </section><!-- /.content -->

