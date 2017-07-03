<?php
	$ambil	= mysql_query("SELECT * FROM profil WHERE id_profil='0001'");
	$tampil	= mysql_fetch_array($ambil);
?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Profil</small>
          </h3></center>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Profil Sekolahan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=profil&act=edit">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
				  <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="<?php echo "$tampil[nama_sekolah]"; ?>" placeholder="Enter Nama Sekolah..." required="" >
					<input type="hidden" id="id_profil" name="id_profil" value="0001" placeholder="Enter Nama Sekolah...">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Alamat Sekolah</label>
                    <textarea class="form-control" rows="3" name="alamat_sekolah" id="alamat_sekolah" placeholder="Enter Alamat Sekolah..." required=""><?php echo "$tampil[alamat_sekolah]"; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Visi</label>
                    <textarea class="form-control" rows="3" name="visi_sekolah" id="visi_sekolah"  placeholder="Enter Visi..." required=""><?php echo "$tampil[visi_sekolah]"; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Misi</label>
                    <textarea class="form-control" rows="3" name="misi_sekolah" id="misi_sekolah" placeholder="Enter Misi..." required=""><?php echo "$tampil[misi_sekolah]"; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Catatan</label>
                    <textarea class="form-control" rows="3" name="catatan_sekolah" id="catatan_sekolah" placeholder="Enter Catatan..." required=""><?php echo "$tampil[catatan_sekolah]"; ?></textarea>
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Foto</label>
                     <input type="file" id="exampleInputFile" name="myFile" id="myFile">
					 <img class="img-responsive  col-lg-12" src="../images/images_profil/<?php echo $tampil['foto_sekolah']; ?>" alt="Foto Profil" />
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Fax*</label>
                    <input type="text" class="form-control" name="fax_sekolah" id="fax_sekolah" value="<?php echo "$tampil[fax_sekolah]"; ?>" placeholder="Enter Fax..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Email*</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo "$tampil[email]"; ?>" placeholder="Enter Email..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>No Telepon*</label>
                    <input type="text" class="form-control" name="no_telepon" id="no_telepon" value="<?php echo "$tampil[no_telepon]"; ?>" placeholder="Enter No Telepon..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>WebSite*</label>
                    <input type="text" class="form-control" name="website" id="website" value="<?php echo "$tampil[website]"; ?>" placeholder="Enter WebSite..." required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nama Kepala Sekolah*</label>
                    <input type="text" class="form-control" name="nama_kepsek" id="nama_kepsek" value="<?php echo "$tampil[nama_kepsek]"; ?>" placeholder="Enter Nama Kepala Sekolah..." required="" >
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Nip Kepala Sekolah*</label>
                    <input type="text" class="form-control" name="nip_kepsek" id="nip_kepsek" value="<?php echo "$tampil[nip_kepsek]"; ?>" placeholder="Enter Nip Kepala Sekolah..." required="" onkeyup="return validasiAngka()">
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
		
		
				<script>
        function validasiHuruf(){
            //untuk nama member
			var nama_kepsek = document.forms['fada']['nama_kepsek'].value;
            if (/[^a-z ]/gi.test(nama_kepsek)) {
                alert('Input hanya menerima huruf');
                document.forms['fada']['nama_kepsek'].value="";
                return false;
            }
        }
		function validasiAngka(){
			//untuk no_telepon
            var nip_kepsek = document.forms['fada']['nip_kepsek'].value;
            if (/\D/g.test(nip_kepsek)) {
                alert('Input hanya menerima angka');
                document.forms['fada']['nip_kepsek'].value="";
                return false;
            }
        }

		
		
</script>