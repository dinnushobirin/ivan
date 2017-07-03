<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Admin</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM admin WHERE admin_id=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['admin_username'] 	="";
		$tampil1['admin_password'] 	="";
		$tampil1['admin_email'] 	="";
		$tampil1['admin_name']          ="";
		$tampil1['admin_id']            ="";
		$act					= "tambah";
	}
?>
		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Admin</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=admin&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
                  <!--untuk form Profil -->
		<div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $tampil1['admin_username']; ?>" placeholder="Enter User Name..." required="">
                    <input type="hidden" id="username1" name="username1" value="<?php echo $tampil1['admin_username']; ?>" >
                    <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $tampil1['admin_id']; ?>" >
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="<?php echo $tampil1['admin_name']; ?>" placeholder="Enter Password..." required="">
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Email sdfs</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" value="<?php echo $tampil1['admin_email']; ?>" placeholder="Enter Password..." required="">
                </div><!-- /.form-group -->
		<div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $tampil1['admin_password']; ?>" placeholder="Enter Password..." required="">
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
              <h3 class="box-title">Data Admin</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT * FROM admin");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
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
                        <td><?php echo $tampil['admin_name']; ?></td>
                        <td><?php echo $tampil['admin_username']; ?></td>
                        <td><?php echo $tampil['admin_email']; ?></td>
                        <td>
                    	<a href="tampil.php?menu=admin&id=<?php echo $tampil['admin_id']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
                        <a href="./aksi.php?menu=admin&act=hapus&id=<?php echo $tampil['admin_id']; ?>"><button  class="btn btn-warning">Delete</button></a>
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