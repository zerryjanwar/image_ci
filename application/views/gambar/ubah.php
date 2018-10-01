<html>
	<head>
		<title>Form Ubah - CRUD Codeigniter</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" />
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/image.css"/>
	</head>
	<body>
	<div class="container">
		<h3><i class="fa fa-wpforms"></i> Edit Data Staff</h3>
		<hr>
		<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

			
			<?php echo form_open_multipart("gambar/ubah/".$gambar->id); ?>

			<table  class="table table-bordered" cellpadding="8">
				<div id="upload" onclick="$('#picture').click()">
			
				<div id="imgp"><img  src=<?php echo"'".base_url("images/".$gambar->nama_file)."';"?> class="img-responsive"  /></div>
				</div>
				<input type="file" name="input_gambar" id="picture"/>
				<input type="text" hidden name="input_img" value="<?php echo set_value('input_img', $gambar->nama_file); ?>"/> 
				<img id="loader" src="<?php echo base_url();?>assets/img/loaderIcon.gif" style="background:transparent; width:30px; margin-left: 130px; visibility:hidden;" >
				<div id = "filename" name="filename" ></div>
				<tr>
					<td>NIS</td>
					<td><input type="text" class="form-control" name="input_card_id" value="<?php echo set_value('input_card_id', $gambar->card_id); ?>" ></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" class="form-control" name="input_nama" value="<?php echo set_value('input_nama', $gambar->nama); ?>"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
					<input type="radio"  name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki', ($gambar->jenis_kelamin == "Laki-laki")? true : false); ?>> Laki-laki
					<input type="radio"  name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan', ($gambar->jenis_kelamin == "Perempuan")? true : false); ?>> Perempuan
					</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td><input type="text" class="form-control" name="input_telp" value="<?php echo set_value('input_telp', $gambar->telp); ?>"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textarea class="form-control textarea" name="input_alamat"><?php echo set_value('input_alamat', $gambar->alamat); ?></textarea></td>
				</tr>
			</table>
				
			<hr>
			<input type="submit" class="btn btn-primary" name="submit" value="Ubah">
			<a href="<?php echo base_url(); ?>"><input type="button" class="btn btn-warning" value="Batal"/></a>
			<?php echo form_close(); ?>
		</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>      
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropimg.js"></script> 
	</body>
</html>
