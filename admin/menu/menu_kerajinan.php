<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small><?php echo ucfirst($_GET['menu']); ?></small>
          </h3></center>
        </section>
<?php
        $menu = $_GET['menu'];
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT k.*,ka.kategori_name,p.pengerajin_nama,a.kelurahan_nama,b.kecamatan_nama 
                                    FROM kerajinan k
                                    LEFT JOIN kategori ka ON ka.kategori_id=k.kerajinan_kategori_id
                                    LEFT JOIN pengerajin p ON p.pengerajin_id=k.kerajinan_pengerajin_id
                                    LEFT JOIN kelurahan a ON k.kerajinan_kelurahan_id = a.kelurahan_id
                                    LEFT JOIN kecamatan b ON k.kerajinan_kecamatan_id= b.kecamatan_id 
                                  WHERE k.kerajinan_id=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['kerajinan_id']                ="";
		$tampil1['kerajinan_kategori_id'] 	="";
		$tampil1['kerajinan_kelurahan_id'] 	="";
		$tampil1['kerajinan_kecamatan_id'] 	="";
		$tampil1['kerajinan_pengerajin_id'] 	="";
		$tampil1['kerajinan_nama']              ="";
		$tampil1['kerajinan_deskripsi'] 	="";
		$tampil1['kerajinan_deskripsi'] 	="";
		$tampil1['kerajinan_foto']              ="";
		$tampil1['kerajinan_foto']          	="";
		$tampil1['kerajinan_alamat']            ="";
		$tampil1['kecamatan_nama']              ="--pilih--";
		$tampil1['kategori_name']               ="--pilih--";
		$tampil1['pengerajin_nama']             ="--pilih--";
		$tampil1['kelurahan_nama']              ="--pilih--";
		$tampil1['kecamatan_nama']              ="";
		$act                                    ="tambah";
	}
?>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form <?php echo ucfirst($_GET['menu']); ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                <form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=<?php echo $menu; ?>&act=<?php echo $act; ?>" enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Kerajinan</label>
                            <input type="text" class="form-control" id="kerajinan_nama" name="kerajinan_nama" value="<?php echo $tampil1['kerajinan_nama']; ?>" placeholder="Enter Nama..." required="">
                            <input type="hidden" id="kerajinan_nama1" name="kerajinan_nama1" value="<?php echo $tampil1['kerajinan_nama']; ?>" >
                            <input type="hidden" id="kerajinan_id" name="kerajinan_id" value="<?php echo $tampil1['kerajinan_id']; ?>" >
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Kategori</label>
                             <select class="form-control select2"  style="width: 100%;" id="kerajinan_kategori_id" name="kerajinan_kategori_id" required="">
                                <option selected value="<?php echo "$tampil1[kerajinan_kategori_id]"; ?>"><?php echo "$tampil1[kategori_name]"; ?></option>
                                <?php 
                                  $ambilg = mysql_query("SELECT * FROM kategori ");
                                  while($tampilg=mysql_fetch_array($ambilg)){
                                      if($tampil1['kerajinan_kategori_id']!==$tampilg['kategori_id']){
                                ?>
                                    <option value="<?php echo "$tampilg[kategori_id]"; ?>"><?php echo "$tampilg[kategori_name]"; ?></option>
                                <?php 
                                      }
                                  }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Nama Pengerajin</label>
                             <select class="form-control select2"  style="width: 100%;" id="kerajinan_pengerajin_id" name="kerajinan_pengerajin_id" required="">
                                <option selected value="<?php echo "$tampil1[kerajinan_pengerajin_id]"; ?>"><?php echo "$tampil1[pengerajin_nama]"; ?></option>
                                <?php 
                                  $ambilg = mysql_query("SELECT * FROM pengerajin ");
                                  while($tampilg=mysql_fetch_array($ambilg)){
                                      if($tampil1['kerajinan_pengerajin_id']!==$tampilg['pengerajin_id']){
                                ?>
                                    <option value="<?php echo "$tampilg[pengerajin_id]"; ?>"><?php echo "$tampilg[pengerajin_nama]"; ?></option>
                                <?php 
                                      }
                                  }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Kelurahan</label>
                             <select class="form-control select2"  style="width: 100%;" id="kerajinan_kelurahan_id" name="kerajinan_kelurahan_id" required="">
                                <option selected value="<?php echo "$tampil1[kerajinan_kelurahan_id]"; ?>"><?php echo "$tampil1[kelurahan_nama] | $tampil1[kecamatan_nama]"; ?></option>
                                <?php 
                                  $ambilg = mysql_query("SELECT * FROM kelurahan a LEFT JOIN kecamatan b ON b.kecamatan_id=a.kelurahan_kecamatan_id");
                                  while($tampilg=mysql_fetch_array($ambilg)){
                                      if($tampil1['kerajinan_kelurahan_id']!==$tampilg['kelurahan_id']){
                                ?>
                                    <option value="<?php echo "$tampilg[kelurahan_id]"; ?>"><?php echo "$tampilg[kelurahan_nama] | $tampilg[kecamatan_nama]"; ?></option>
                                <?php 
                                      }
                                  }
                                ?>
                            </select>
                        </div><!-- /.form-group -->
                        
                        <div class="form-group">
                            <label>Info</label>
                            <input type="text" class="form-control" id="kerajinan_deskripsi" name="kerajinan_deskripsi" value="<?php echo $tampil1['kerajinan_deskripsi']; ?>" placeholder="Enter Info..." required="">
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="kerajinan_alamat" name="kerajinan_alamat" placeholder="Enter Alamat..." required=""><?php echo $tampil1['kerajinan_alamat']; ?></textarea> 
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" id="exampleInputFile" name="myFile" id="myFile">
                            <img class="img-responsive  col-lg-12" src="../images/images_kerajinan/<?php echo $tampil1['kerajinan_foto']; ?>" alt="Foto <?php echo $tampil1['kerajinan_foto']; ?>" />
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
              <h3 class="box-title">Data <?php echo ucfirst($_GET['menu']); ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT k.*,ka.kategori_name,p.pengerajin_nama,a.kelurahan_nama,b.kecamatan_nama 
                    FROM kerajinan k
                    LEFT JOIN kategori ka ON ka.kategori_id=k.kerajinan_kategori_id
                    LEFT JOIN pengerajin p ON p.pengerajin_id=k.kerajinan_pengerajin_id
                    LEFT JOIN kelurahan a ON k.kerajinan_kelurahan_id = a.kelurahan_id
                    LEFT JOIN kecamatan b ON k.kerajinan_kecamatan_id= b.kecamatan_id 
                ");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Kerajinan</th>
                        <th>Nama Pengerajin</th>
                        <th>Alamat</th>
                        <th>Info</th>
                        <th>Foto</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
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
                        <td><?php echo $tampil['kategori_name']; ?></td>
                        <td><?php echo $tampil['kerajinan_nama']; ?></td>
                        <td><?php echo $tampil['pengerajin_nama']; ?></td>
                        <td><?php echo $tampil['kerajinan_alamat']; ?></td>
                        <td><?php echo $tampil['kerajinan_deskripsi']; ?></td>
                        <td><?php echo $tampil['kerajinan_foto']; ?></td>
                        <td><?php echo $tampil['kecamatan_nama']; ?></td>
                        <td><?php echo $tampil['kelurahan_nama']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=<?php echo $menu; ?>&id=<?php echo $tampil['kerajinan_id']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
                        <a href="./aksi.php?menu=<?php echo $menu; ?>&act=hapus&id=<?php echo $tampil['kerajinan_id']; ?>" onclick="return confirm('Apakah Kamu Yakin?')"><button  class="btn btn-warning">Delete</button></a>
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