<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Guru</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM guru WHERE nip=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['nip']		 		="";
		$tampil1['password'] 		="";
		$tampil1['nama_guru'] 		="";
		$tampil1['alamat']	 		="";
		$tampil1['jenis_kelamin']	="--pilih--";
		$tampil1['agama'] 			="";
		$tampil1['tempat_lahir']	="";
		$tampil1['tanggal_lahir']	="";
		$tampil1['no_telp'] 		="";
		$act						="tambah";
	}
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Guru</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=guru&act=<?php echo $act; ?>" enctype='multipart/form-data'>
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
				  <div class="form-group">
                    <label>Nip</label>
                    <input type="text" class="form-control" placeholder="Enter User Name..." name="nip" id="nip" value="<?php echo $tampil1['nip']; ?>" required="" onkeyup="return validasiAngka()" >
					<input type="hidden" class="form-control" name="nip1" id="nip1" value="<?php echo $tampil1['nip']; ?>"   >
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password..." name="password" id="password" value="<?php echo $tampil1['password']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Guru</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Guru..." name="nama_guru" id="nama_guru" value="<?php echo $tampil1['nama_guru']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat..." name="alamat" id="alamat" required=""><?php echo $tampil1['alamat']; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2"  name="jenis_kelamin" id="jenis_kelamin" style="width: 100%;">
                      <option selected><?php echo $tampil1['jenis_kelamin']; ?></option>
					  <option value="L">L</option>
                      <option value="P">P</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control select2" name="agama" id="agama" style="width: 100%;">
                      <option selected><?php echo $tampil1['agama']; ?></option>
					  <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kong Hu Chu">Kong Hu Chu</option>
                      <option value="Lainya.">Lainya.</option>
                    </select>
					
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" placeholder="Enter Tempat Lahir..." name="tempat_lahir" id="tempat_lahir" value="<?php echo $tampil1['tempat_lahir']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo tampil_tgl($tampil1['tanggal_lahir']); ?>" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>(Bulan/Tanggal/Tahun)
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" placeholder="Enter Tempat Lahir..." name="no_telp" id="no_telp" value="<?php echo $tampil1['no_telp']; ?>" required="">
                  </div><!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="exampleInputFile" name="myFile" id="myFile" >
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
	$ambil	= mysql_query("SELECT * FROM guru");
?>              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Guru</th>
                        <th>Nip</th>
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
                        <td><?php echo "$tampil[nama_guru]"; ?></td>
                        <td><?php echo "$tampil[nip]"; ?></td>
                        <td>
                    		<a href="tampil.php?menu=guru&id=<?php echo $tampil['nip']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
							<a href="./aksi.php?menu=guru&act=hapus&id=<?php echo $tampil['nip']; ?>"><button  class="btn btn-warning">Delete</button></a>
						</td>
                      </tr>
<?php
	$no++;		
	}
?>                      
                    </tbody>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->
		
		<script>
        function validasiAngka(){
			//untuk nip guru
            var nip = document.forms['fada']['nip'].value;
            if (/\D/g.test(nip)) {
                alert('Input hanya menerima angka');
                document.forms['fada']['nip'].value="";
                return false;
            }
        }

</script>