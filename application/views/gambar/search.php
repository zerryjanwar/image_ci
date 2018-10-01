<html>	
	<head>
		<title>CRUD Codeigniter</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/image.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/iseng.css"/>
	

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 

	
	</head>
	<body>
		<main>			
			<ol class="breadcrumb hejo">
			  <li class="active">View Data</li>
			  <li><a href='<?php echo base_url("index.php/gambar/tambah"); ?>'>Add Data</a></li>
			</ol>		
		</main>
		<div class="container">
				<h2 class="header"> <i class="fa fa-user-circle" ></i> Data Staff</h2>
				<hr>
				<div class="row">
					<div class="gp_btn">
	                      <ul>
			                    <div class="col-md-4">
			                           <li>
			                                <?php echo form_open('gambar/cari');?>
			                               	
			                                  <div class="input-group" >
			                                     <input type="text" name="key" class="form-control" placeholder="Search..." size="50" required>
			                                      <div class="input-group-btn">
			                                     	      <button style="padding:9px; "class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
			                                     </div>
			                                  </div>
			                               
			                                <?php echo form_close();?>
			                           </li>
			                    </div>
			                	<div class="col-md-1" style="padding: 0px;" >
			                          	<li>
			                           		<a style="margin: 0px;" class="btn2" href="<?php echo base_url(); ?>index.php/gambar">Reset</a>
			                           </li>
			                 	</div>
	                      </ul>
	                </div>
	                <div class="col-md-5">
	                </div>
	                <div class="col-md-1">
	                	<a class="btn btn-primary" href='<?php echo base_url("index.php/gambar/tambah"); ?>'>Tambah Data <i class="fa fa-plus"></i></a>
	                </div>
              </div> 

				<div class="table-responsive">
				<table id="gp_tabel" class="table table-bordered " border="1" cellpadding="7">
					<tr style='background-color: #337ab7; '>
						<th>No</th>
						<th width="10%">Gambar</th>
						<th>Card_ID</th>
						<th>Nama</th>
						<th>Gender</th>
						<th>Telepon</th>
						<th width="30%">Alamat</th>
						<th colspan="2" width="2%">Aksi</th>
					</tr>
					<tbody>
				<?php
				if($this->uri->segment(4)){
                     $no=$this->uri->segment(4);
                }
                else{
                     $no=0;
                }
					if( ! empty($gambar)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
						foreach($gambar as $data){  // Lakukan looping pada variabel gambar dari controller
						  $no++;	
							echo "<tr>";
							echo "<td>$no</td>";
							echo "<td><img src='".base_url("images/".$data->nama_file)."' width='100' height='100'></td>";
							echo "<td>".$data->card_id."</td>";
							echo "<td>".$data->nama."</td>";
							echo "<td>".$data->jenis_kelamin."</td>";
							echo "<td>".$data->telp."</td>";
							echo "<td>".$data->alamat."</td>";
							echo "<td><a class='btn btn-sm btn-success' href='".base_url("index.php/gambar/ubah/".$data->id)."'> Edit <i class='fa fa-edit'></i></a></td>";
							echo "<td><a class='btn btn-sm btn-danger' href='".base_url("index.php/gambar/hapus/".$data->id)."'> Hapus <i class='fa fa-trash'></i></a></td>";
						echo "</tr>";
						}
					}else{ // Jika data tidak ada
							echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
					}

				?>
				</tbody>
				</table>
					<div id="pagination">
		                 <ul class="gp_pagination">
		 
		                      <!-- Pagination links -->
		                      <?php foreach ($links as $link) {
		                           echo "<li>". $link."</li>";
		                      } ?>
		                 </ul>
		            </div>
		
   			</div>
		</div>
	</body>
</html>