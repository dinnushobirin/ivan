<!-- Content Header (Page header) -->
        <section class="content-header">
          <center><h3>
            Menu
            <small>Semester Tahun Ajaran</small>
          </h3></center>
        </section>
<?php
	if(!empty($_GET['id'])){
		$ambil1		= mysql_query("SELECT * FROM semester_tahun WHERE id_semester_tahun=$_GET[id]");
		$tampil1	= mysql_fetch_array($ambil1);
		$act		= "edit";
	}
	else{
		$tampil1['id_semester_tahun'] 	="";
		$tampil1['tahun_ajaran']		="";
		$tampil1['semester'] 			="";
		$tampil1['pilih'] 				="--pilih--";
		$act							= "tambah";
	}
?>		
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Form Semester Tahun Ajaran</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
			<form role="form" name="fada" id="fada"  method="POST" action="aksi.php?menu=semester_tahun&act=<?php echo $act; ?>">
              <div class="row">
	  		    <div class="col-md-3">
                </div>
				<div class="col-md-6">
				  <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="hidden" class="form-control" id="id_semester_tahun" name="id_semester_tahun" value="<?php echo $tampil1['id_semester_tahun']; ?>" >
					<input type="text" class="form-control" placeholder="Enter Nama Mata Pelajaran..." id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $tampil1['tahun_ajaran']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Semester</label>
                    <input type="text" class="form-control" placeholder="Enter Semester..." id="semester" name="semester" value="<?php echo $tampil1['semester']; ?>" required="">
                  </div><!-- /.form-group -->
				  <div class="form-group">
                    <label>Pilih</label>
                    <select class="form-control select2"  style="width: 100%;" id="pilih" name="pilih" required="" >
                      <option selected value="<?php echo $tampil1['pilih']; ?>"><?php echo $tampil1['pilih']; ?></option>
                      <option value="Y">Y</option>
                      <option value="T">T</option>
                    </select>
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
              <h3 class="box-title">Data Semester Tahun</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
<?php
	$ambil	= mysql_query("SELECT * FROM semester_tahun ");
?>			
              
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
						<th>Pilih</th>
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
                        <td><?php echo $tampil['tahun_ajaran']; ?></td>
                        <td><?php echo $tampil['semester']; ?></td>
						<td><?php echo $tampil['pilih']; ?></td>
                        <td>
                   		<a href="tampil.php?menu=semester_tahun&id=<?php echo $tampil['id_semester_tahun']; ?>"><button  class="btn btn-primary">Edit</button></a> | 
						<a href="./aksi.php?menu=semester_tahun&act=hapus&id=<?php echo $tampil['id_semester_tahun']; ?>"><button  class="btn btn-warning">Delete</button></a>
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
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
						<th>Pilih</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
           
		    </div><!-- /.box-body -->
            
          </div><!-- /.box -->
        </section><!-- /.content -->