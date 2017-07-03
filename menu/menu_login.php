 <?php
	session_start();
	//isset
if (!empty($_SESSION['nis'])){
  echo "<meta http-equiv='refresh' content='0;url=index.php?menu=rapot'>";
exit;
}
else{
?>
 <div class="row clearfix" >
					<div class="grid_4" >
					&nbsp;
					</div>
					
                    <div class="grid_4 inner service-old sb6 clearfix tac" >
					 	<div class="stitle mb clearfix custom-color-icon10" >
							<i class="service-icon icon-heart custom-color-icon10" ></i>
							<h3><a href="?menu=login" >Login Siswa</a></h3>
						</div>
							
						
                        <div  id="ttcf7-f5-p261-o2" lang="en-US" dir="ltr">
							
                            
                            <form action="./cek_login.php" method="post">
        
        	<p>NIS(Nomor Induk Siswa)
<input type="text" name="nis" id="nis"  size="40" required="" style="padding:10px; background-color:#e7eaeb;color:#0f36f0" placeholder="Nomer Induk Siswa" class="inner"/></p>
								<p>Password<br />
									<input type="password" name="password" id="password" size="40" required="" style="padding:10px; background-color:#e7eaeb;color:#0f36f0" placeholder="Password Siswa" class="inner"/></p>
								
								<p>
									<button type="submit"  class="tbutton small tbutton1 color4 "  style="padding:10px; "><i class="icon-hand-up"  ></i> Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
									<button type="reset"  class="tbutton small tbutton1 color5 "  style="padding:10px; "> Reset</button>
								</p>
								
							</form>
							
							
						
                        </div>
						<br />
					 <p align="left" style="color:#ff0000;">Silahkan Login!! Untuk Melanjutkan.</p>
                    </div> 
			</div>
			
<?php
	}
?>