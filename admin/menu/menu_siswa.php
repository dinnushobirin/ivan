<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Siswa</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM siswa WHERE nis='$_GET[id]'");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['nis']	 			="";
		$tampil1['password_siswa'] 	="";
		$tampil1['nama_lengkap'] 	="";
		$tampil1['jenis_kelamin'] 	="";
		$tampil1['tempat_lahir'] 	="";
		$tampil1['tanggal_lahir'] 	="";
		$tampil1['agama'] 			="";
		$tampil1['anak_ke'] 		="";
		$tampil1['status_anak'] 	="";
		$tampil1['alamat_siswa'] 	="";
		$tampil1['telepon_ortu'] 	="";
		$tampil1['terima_di_kelas'] ="";
		$tampil1['terima_pada_tanggal']	="";
		$tampil1['nama_sekolah_asal'] 	="";
		$tampil1['alamat_sekolah_asal']	="";
		$tampil1['nama_ayah'] 		="";
		$tampil1['nama_ibu'] 		="";
		$tampil1['pekerjaan_ayah'] 	="";
		$tampil1['pekerjaan_ibu'] 	="";
		$tampil1['alamat_ayah'] 	="";
		$tampil1['alamat_ibu'] 		="";
		$tampil1['nama_wali'] 		="";
		$tampil1['alamat_wali'] 	="";
		$tampil1['telepon_wali'] 	="";
		$tampil1['pekerjaan_wali'] 	="";
		$tampil1['tanggal_input'] 	="";
		$act						= "tambah";
	}
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
		  <form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=siswa&act=<?php echo $act; ?>" enctype='multipart/form-data'>
            <div class="box-header with-border">
              <h3 class="box-title">Form Siswa</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
			
            <div class="box-body">
			
              <div class="row">
	  		    <div class="col-md-4">
               	  <div class="form-group">
                    <label>Nis</label>
                    <input type="text" class="form-control" placeholder="Enter User Name..." name="nis" id="nis" value="<?php echo "$tampil1[nis]"; ?>" required="" maxlength="4">
					<input type="hidden" class="form-control" name="nis1" id="nis1" value="<?php echo "$tampil1[nis]"; ?>">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password..." name="password_siswa" id="password_siswa" value="<?php echo "$tampil1[password_siswa]"; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Lengkap..." name="nama_lengkap" id="nama_lengkap" value="<?php echo "$tampil1[nama_lengkap]"; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2"  style="width: 100%;" name="jenis_kelamin" id="jenis_kelamin" required="">
                      <option selected value="<?php echo "$tampil1[jenis_kelamin]"; ?>"><?php echo "$tampil1[jenis_kelamin]"; ?></option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" placeholder="Enter Tempat Lahir..." name="tempat_lahir" id="tempat_lahir" value="<?php echo "$tampil1[tempat_lahir]"; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo tampil_tgl($tampil1['tanggal_lahir']); ?>" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="">(Bulan/Tanggal/Tahun)
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control select2"  style="width: 100%;" name="agama" id="agama" required="">
                      <option selected value="<?php echo $tampil1['agama']; ?>"><?php echo $tampil1['agama']; ?></option>
					  <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
					  <option value="Budha">Budha</option>
					  <option value="Kong Hu Chu">Kong Hu Chu</option>
                      <option value="lainya..">lainya..</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Alamat Siswa</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat Siswa..." name="alamat_siswa" id="alamat_siswa" required=""><?php echo $tampil1['alamat_siswa']; ?></textarea>
                  </div><!-- /.form-group -->
				  
				</div>
				<div class="col-md-4">
				  <div class="form-group">
                    <label>Anak Ke</label>
                    <input type="text" class="form-control" placeholder="Enter User Anak Ke..." name="anak_ke" id="anak_ke" value="<?php echo $tampil1['anak_ke']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Status Anak</label>
                    <select class="form-control select2"  style="width: 100%;" name="status_anak" id="status_anak" required="">
                      <option selected value="<?php echo $tampil1['status_anak']; ?>"><?php echo $tampil1['status_anak']; ?></option>
					  <option value="Kandung">Kandung</option>
                      <option value="Asuh">Asuh</option>
                      <option value="lainya..">lainya..</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Telepon Orang Tua</label>
                    <input type="text" class="form-control" placeholder="Enter Telepon Orang Tua..." name="telepon_ortu" id="telepon_ortu" value="<?php echo $tampil1['telepon_ortu']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Terima Di Kelas</label>
                    <input type="text" class="form-control" placeholder="Enter Terima Di Kelas..." name="terima_di_kelas" id="terima_di_kelas" value="<?php echo $tampil1['terima_di_kelas']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Terima Pada Tanggal</label>
                    <input type="text" class="form-control" name="terima_pada_tanggal" id="terima_pada_tanggal" value="<?php echo tampil_tgl($tampil1['terima_pada_tanggal']); ?>" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required="">(Bulan/Tanggal/Tahun)
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Alamat Sekolah Asal</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat Sekolah Asal..." name="alamat_sekolah_asal" id="alamat_sekolah_asal" required=""><?php echo $tampil1['alamat_sekolah_asal']; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Sekolah Asal</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Sekolah Asal..." name="nama_sekolah_asal" id="nama_sekolah_asal" value="<?php echo $tampil1['nama_sekolah_asal']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Ayah..." name="nama_ayah" id="nama_ayah" value="<?php echo $tampil1['nama_ayah']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Ibu..." name="nama_ibu" id="nama_ibu" value="<?php echo $tampil1['nama_ibu']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Pekerjaan Ayah</label>
                    <select class="form-control select2"  style="width: 100%;" name="pekerjaan_ayah" id="pekerjaan_ayah" required="">
                      <option selected value="<?php echo $tampil1['pekerjaan_ayah']; ?>"><?php echo $tampil1['pekerjaan_ayah']; ?></option>
					  <option value="PNS">PNS</option>
                      <option value="Petani">Petani</option>
                      <option value="Karyawan Swasta">Karywan Swasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="lainya..">lainya..</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Pekerjaan Ibu</label>
                    <select class="form-control select2"  style="width: 100%;" name="pekerjaan_ibu" id="pekerjaan_ibu" required="">
                      <option selected value="<?php echo $tampil1['pekerjaan_ibu']; ?>"><?php echo $tampil1['pekerjaan_ibu']; ?></option>
					  <option value="PNS">PNS</option>
                      <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                      <option value="Petani">Petani</option>
                      <option value="Karywan Swasta">Karywan Swasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="lainya..">lainya..</option>
                    </select>
                  </div><!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Alamat Ayah</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat Ayah..." name="alamat_ayah" id="alamat_ayah" ><?php echo $tampil1['alamat_ayah']; ?></textarea>
                  </div><!-- /.form-group -->
				  
				  <div class="form-group">
                    <label>Alamat Ibu</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat Ibu..." name="alamat_ibu" id="alamat_ibu" ><?php echo $tampil1['alamat_ibu']; ?></textarea>
                  </div><!-- /.form-group -->
				  
				 </div>
				<div class="col-md-4">
				  <div class="form-group">
                    <label>Nama Wali</label>
                    <input type="text" class="form-control" placeholder="Enter Nama Wali..." name="nama_wali" id="nama_wali" value="<?php echo $tampil1['nama_wali']; ?>" >
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Alamat Wali</label>
                    <textarea class="form-control" rows="3" placeholder="Enter Alamat Wali..." name="alamat_wali" id="alamat_wali" ><?php echo $tampil1['alamat_wali']; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Telepon Wali</label>
                    <input type="text" class="form-control" placeholder="Enter Telepon Wali..." name="telepon_wali" id="telepon_wali" value="<?php echo $tampil1['telepon_wali']; ?>" >
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Pekerjaan Wali</label>
                    <select class="form-control select2"  style="width: 100%;" name="pekerjaan_wali" id="pekerjaan_wali" >
                      <option selected value="<?php echo $tampil1['pekerjaan_wali']; ?>"><?php echo $tampil1['pekerjaan_wali']; ?></option>
                      <option value="Petani">Petani</option>
                      <option value="Karywan Swasta">Karywan Swasta</option>
                      <option value="Wirausaha">Wirausaha</option>
                      <option value="lainya..">lainya..</option>
                    </select>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="exampleInputFile" name="myFile" id="myFile" >
                  </div><!-- /.form-group -->
				  			   
                </div><!-- /.col -->
				
				  
              </div><!-- /.row -->
			        
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
          </div><!-- /.box -->
		  
        </section><!-- /.content -->
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Siswa</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">

<?php
	$ambil	= mysql_query("SELECT * FROM siswa");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Nis</th>
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
                        <td><?php echo $tampil['nama_lengkap']; ?></td>
                        <td><?php echo $tampil['nis']; ?></td>
                        <td>
                    		<a href="tampil.php?menu=siswa&id=<?php echo $tampil['nis']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
							<a href="./aksi.php?menu=siswa&act=hapus&id=<?php echo $tampil['nis']; ?>"><button  class="btn btn-warning">Delete</button></a>
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
                        <th>Nama Siswa</th>
                        <th>Nis</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->