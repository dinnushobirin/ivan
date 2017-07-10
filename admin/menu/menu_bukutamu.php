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
		$ambil1		= mysql_query("SELECT * FROM bukutamu WHERE bukutamu_id=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['kategori_id'] 	="";
		$tampil1['kategori_name'] 	="";
		$tampil1['kategori_info'] 	="";
		$act				= "tambah";
	}
        if($act=="edit"){
            
?>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Detail <?php echo ucfirst($_GET['menu']); ?></h3>
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
                    <label>Nama Bukutamu</label>
                    <input type="text" class="form-control" value="<?php echo $tampil1['bukutamu_name']; ?>" disabled="">
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="<?php echo $tampil1['bukutamu_email']; ?>" disabled="">
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" disabled=""><?php echo $tampil1['bukutamu_desc']; ?></textarea>
                </div><!-- /.form-group -->
		
				  				   
				  
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
            <div class="box-header with-border">
              <h3 class="box-title">Data <?php echo ucfirst($_GET['menu']); ?></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT * FROM bukutamu");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Tamu</th>
                        <th>Email</th>
                        <th>Deskripsi</th>
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
                        <td><?php echo $tampil['bukutamu_name']; ?></td>
                        <td><?php echo $tampil['bukutamu_email']; ?></td>
                        <td><?php echo $tampil['bukutamu_desc']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=<?php echo $menu; ?>&id=<?php echo $tampil['bukutamu_id']; ?>"><button  class="btn btn-primary">Detail</button></a> | 
                        <a href="./aksi.php?menu=<?php echo $menu; ?>&act=hapus&id=<?php echo $tampil['bukutamu_id']; ?>" onclick="return confirm('Apakah Kamu Yakin?')"><button  class="btn btn-warning">Delete</button></a>
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