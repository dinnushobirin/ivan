<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Nilai Siswa</small>
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
                    <form role="form"action='tampil.php?menu=nilai' method="POST" >		  
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
			
			<form role="form"action='./aksi.php?menu=nilai&act=edit' method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <div class="box-body table-responsive no-padding">

<?php
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis WHERE id_kelas='$_POST[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");
?>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
						<th>Nama Siswa</th>
                        <th>Sikap</th>
						<th>Kerajinan</th>
						<th>Kebersihan <br />/Ketrampilan</th>
						<th>Izin</th>
						<th>Sakit</th>
						<th>Tanpa <br /> Keterangan</th>
						<th>Catatan Diri</th>
						<th>Catatan</th>
						<th>Nis</th>
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
						<td>
						<input type="hidden" size="2" value="<?php echo $tampil['id_nilai']; ?>" name="id_nilai[]" id="id_nilai[]">
						<select class="form-control select2" name="sikap[<?php echo $tampil['id_nilai']; ?>]" id="sikap[<?php echo $tampil['id_nilai']; ?>]" style="width: 100%;">
                      		<option selected value="<?php echo $tampil['sikap']; ?>"><?php echo $tampil['sikap']; ?></option>
                      		<option value="A">A</option>
                      		<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
                    	</select>
						</td>
						<td>
						<select class="form-control select2"  style="width: 100%;" name="kerajinan[<?php echo $tampil['id_nilai']; ?>]" id="kerajinan[]">
                      		<option selected value="<?php echo $tampil['kerajinan']; ?>"><?php echo $tampil['kerajinan']; ?></option>
                      		<option value="A">A</option>
                      		<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
                    	</select>
						</td>
						<td>
						<select class="form-control select2"  style="width: 100%;" name="kebersihan_ketrampilan[<?php echo $tampil['id_nilai']; ?>]" id="keberhasilan_ketrampilan[<?php echo $tampil['id_nilai']; ?>]">
                      		<option selected value="<?php echo $tampil['kebersihan_ketrampilan']; ?>"><?php echo $tampil['kebersihan_ketrampilan']; ?></option>
                      		<option value="A">A</option>
                      		<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
                    	</select>
						</td>
						<td><input type="text" size="2" value="<?php echo $tampil['izin']; ?>" name="izin[<?php echo $tampil['id_nilai']; ?>]" id="izin[<?php echo $tampil['id_nilai']; ?>]"></td>
						<td><input type="text" size="2" value="<?php echo $tampil['sakit']; ?>" name="sakit[<?php echo $tampil['id_nilai']; ?>]" id="sakit[<?php echo $tampil['id_nilai']; ?>]"></td>
						<td><input type="text" size="2" value="<?php echo $tampil['tanpa_keterangan']; ?>" name="tanpa_keterangan[<?php echo $tampil['id_nilai']; ?>]" id="tanpa_keterangan[<?php echo $tampil['id_nilai']; ?>]"></td>
						<td><textarea  name="catatan_diri[<?php echo $tampil['id_nilai']; ?>]" id="catatan_diri[<?php echo $tampil['id_nilai']; ?>]"><?php echo $tampil['catatan_diri']; ?></textarea></td>
						<td><textarea  name="catatan[<?php echo $tampil['id_nilai']; ?>]" id="catatan[<?php echo $tampil['id_nilai']; ?>]"><?php echo $tampil['catatan']; ?></textarea></td>
						<td><?php echo $tampil['nis']; ?></td>
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
                        <th>Sikap</th>
						<th>Kerajinan</th>
						<th>Kebersihan <br />/Ketrampilan</th>
						<th>Izin</th>
						<th>Sakit</th>
						<th>Tanpa <br /> Keterangan</th>
						<th>Catatan Diri</th>
						<th>Catatan</th>
						<th>Nis</th>
                      </tr>
                    </tfoot>
                  </table>
				  
				  
           		</div>
		    </div><!-- /.box-body -->
            <div class="box-footer">
				 <div class="col-md-4">
				  
				  </div>
				 <div class="col-md-4">
                    <button type="reset" class="btn btn-default ">Reset</button>
                    <button type="submit" class="btn btn-info ">Save</button>
            	 </div><!-- /.box-footer -->
				</div>	
			 </form>
<?php
	}
?> 	 
			 
			 
          </div><!-- /.box -->
        </section><!-- /.content -->