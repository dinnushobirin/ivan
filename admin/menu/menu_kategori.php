<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Kategori</small>
          </h3></center>
        </section>
<?php
        $menu = $_GET['menu'];
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM kategori WHERE kategori_id=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['kategori_id'] 	="";
		$tampil1['kategori_name'] 	="";
		$tampil1['kategori_info'] 	="";
		$act				= "tambah";
	}
?>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kategori</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=<?php echo $menu; ?>&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
		<div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori_name" name="kategori_name" value="<?php echo $tampil1['kategori_name']; ?>" placeholder="Enter Nama Kategori..." required="">
                    <input type="hidden" id="kategori_name1" name="kategori_name1" value="<?php echo $tampil1['kategori_name']; ?>" >
                    <input type="hidden" id="kategori_id" name="kategori_id" value="<?php echo $tampil1['kategori_id']; ?>" >
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Info</label>
                    <input type="text" class="form-control" id="kategori_info" name="kategori_info" value="<?php echo $tampil1['kategori_info']; ?>" placeholder="Enter Info Kategori..." required="">
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
              <h3 class="box-title">Data Kategori</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT * FROM kategori");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Info</th>
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
                        <td><?php echo $tampil['kategori_info']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=<?php echo $menu; ?>&id=<?php echo $tampil['kategori_id']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
                        <a href="./aksi.php?menu=<?php echo $menu; ?>&act=hapus&id=<?php echo $tampil['kategori_id']; ?>" onclick="return confirm('Apakah Kamu Yakin?')"><button  class="btn btn-warning">Delete</button></a>
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