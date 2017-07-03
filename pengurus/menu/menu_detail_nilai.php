<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Masukan Detail Nilai</small>
          </h3></center>
        </section>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Nilai Kepribadian Siswa</h3>
			  <div class="col-md-4">
	
	    <form role="form"action='tampil.php?menu=detail_nilai' method="POST" >		  
<?php
	if(!empty($_POST['id_kelas']) AND !empty($_POST['id_mapel']) AND !empty($_SESSION['nip'])){
		$ambilk	= mysql_query("SELECT * FROM kelas WHERE id_kelas='$_POST[id_kelas]' AND nip='$_SESSION[nip]'");
		$tampilk=mysql_fetch_array($ambilk);
		
		$ambilm	= mysql_query("SELECT * FROM mapel WHERE id_mapel=$_POST[id_mapel]");
		$tampilm=mysql_fetch_array($ambilm);
		
	}
	else{
		$tampilk['nama_kelas'] 	= "--Pilih Kelas--";
		$tampilm['nama_mapel'] 	= "--Pilih Mata Pelajaran--";
	}
	$ambilg	= mysql_query("SELECT * FROM kelas k JOIN guru g ON k.nip=g.nip WHERE k.nip='$_SESSION[nip]'");
				$i = mysql_num_rows($ambilg);
				if(empty($i)){
					$tampilk['nama_kelas'] 	= "Anda Bukan Wali Kelas";
					$tampilm['nama_mapel'] 	= "----";	
					$tampilk['id_kelas']	= "";
				}
?>		  
			  	<div class="form-group">
                    <select class="form-control select2"  style="width: 100%;" id="id_kelas" name="id_kelas" required="">
                      <option selected value="<?php echo $tampilk['id_kelas']; ?>"><?php echo $tampilk['nama_kelas']; ?></option>
        <?php 
			
			while($tampilg=mysql_fetch_array($ambilg)){
				
		 ?>
		              <option value="<?php echo "$tampilg[id_kelas]"; ?>"><?php echo "$tampilg[nama_kelas] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
				  <select class="form-control select2"  style="width: 100%;" id="id_mapel" name="id_mapel" >
                      <option selected value="<?php echo $tampilm['id_mapel']; ?>"><?php echo $tampilm['nama_mapel']; ?></option>
        <?php 
			$ambilg	= mysql_query("SELECT * FROM mapel m JOIN guru g ON m.nip=g.nip");
			while($tampilg=mysql_fetch_array($ambilg)){
		 ?>
		              <option value="<?php echo "$tampilg[id_mapel]"; ?>"><?php echo "$tampilg[nama_mapel] | $tampilg[nama_guru]"; ?></option>
		<?php 
			}
		?>
                    </select>
                  </div><!-- /.form-group -->
			  <button type="submit" class="btn btn-info ">Pilih</button>
			  </form>
			</div>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
<?php
		if(!empty($_POST['id_kelas'])){
?>			
			<form role="form"action='./aksi.php?menu=detail_nilai&act=edit' method="POST" enctype='multipart/form-data'>
            <div class="box-body">
<?php

	
		
	$ambil	= mysql_query("SELECT * FROM nilai n JOIN siswa s ON n.nis=s.nis WHERE id_kelas='$_POST[id_kelas]' AND id_semester_tahun='$id_semester_tahun'");
		
	
?>			
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Nis</th>
						<th>Nilai</th>
						<th>Nama Siswa</th>
                      </tr>
                    </thead>
                    <tbody>
					
<?php
	$no = 1;
	while($tampil =mysql_fetch_array($ambil)){
	$ambild = mysql_query("SELECT * FROM detail_nilai WHERE id_nilai='$tampil[id_nilai]' AND id_mapel='$_POST[id_mapel]'");
	$tampild = mysql_fetch_array($ambild);	
?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $tampil['nis']; ?></td>
						<td>
						<input type="hidden"  name="id_mapel"  value="<?php echo "$tampilm[id_mapel]"; ?>">
						<input type="text" size="5" name="nilai[<?php echo $tampil['id_nilai']; ?>]"  value="<?php echo $tampild['nilai_mapel']; ?>">
							
						</td>
						<td><?php echo $tampil['nama_lengkap']; ?></td>
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
						<th>Nilai</th>
						<th>Nama Siswa</th>
                      </tr>
                    </tfoot>
                  </table>
 
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