<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Cetak Biodata Siswa</small>
          </h3></center>
        </section>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
		  
            <div class="box-header with-border">
              <h3 class="box-title">Data Nilai Kepribadian Siswa</h3>
			  <div class="col-md-4">
			  <div class="form-group">
                    <label>Kelas</label>
                    <form role="form"action='tampil.php?menu=cetak_biodata_siswa' method="POST" >		  
<?php
	if(!empty($_POST['id_kelas'])){
		$ambilk	= mysql_query("SELECT * FROM kelas WHERE id_kelas=$_POST[id_kelas]");
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
                  </div><!-- /.form-group -->
			</div>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
<?php
	if(!empty($_POST['id_kelas'])){
?>			
			
			 <div class="box-body">
			
              <div class="box-body table-responsive no-padding">

<?php
	
		
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis WHERE id_kelas='$_POST[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");
		
	
?>
                  <table id="example1" class="table table-bordered table-striped" width="95%">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
						<th>Nama Siswa</th>
						<th>Cetak</th>
                      </tr>
                    </thead>
                    <tbody>
 <?php
	$no = 1;
	while($tampil =mysql_fetch_array($ambil)){
		
?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tampil['nis']; ?></td>
						<td><?php echo $tampil['nama_lengkap']; ?></td>
                      	<td><a href="./cetak.php?menu=cetak_biodata_siswa&id=<?php echo $tampil['id_nilai']; ?>" target="_blank" ><button  class="btn btn-info ">Cetak</button></a></td>
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
						<th>Cetak</th>
                      </tr>
                    </tfoot>
                  </table>
				  
				  
           		</div>
		    </div><!-- /.box-body -->
            <div class="box-footer">
				
				</div>
<?php
	}
?> 	 
			 
			 
          </div><!-- /.box -->
        </section><!-- /.content -->