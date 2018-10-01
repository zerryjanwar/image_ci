<html>
	<head>
		<title>Form Tambah - CRUD Codeigniter</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/image.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
		<ol class="breadcrumb">
			<li><a href='<?php echo base_url("index.php/gambar/"); ?>'>View Data</a></li>
			<li class="active">Add Data</li>
		</ol>
	<div class="container fluid">

		<h3><i class="fa fa-wpforms"></i> Tambah Data Staff</h3>
		<hr>
		<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
		<!-- Menampilkan Error jika validasi tidak valid -->
		<div style="color: red;"><?php echo validation_errors(); ?></div>

			<div class="container">
			<?php echo form_open("gambar/tambah", array('enctype'=>'multipart/form-data')); ?>
				<div id="upload" onclick="$('#picture').click()">
				<div id="imgp"><img src="<?php echo base_url();?>assets/img/default.png" class="img-responsive"  /></div>
				<?php echo set_radio('gambar', 'file_name'); ?>
				</div>
				<input type="file" name="input_gambar" id="picture"/>
				<img id="loader" src="<?php echo base_url();?>assets/img/loaderIcon.gif" style="background:transparent; width:30px; margin-left: 130px; visibility:hidden;" >
				<div id = "filename" name="filename" ></div>	
			<!--glyphicon glyphicon-lock-->
			
				<div class="form-group row">
					<div class="col-md-1">
						<label> NIS </label>
					</div>
					<div class="col-md-8">
						<input type="text" name="input_card_id" value="<?php echo set_value('input_card_id'); ?>" class="form-control">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-md-1">
						<label> Nama </label>
					</div>
					<div class="col-md-8">
						<input type="text" name="input_nama" value="<?php echo set_value('input_nama'); ?>" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-1">
						<label> Gender </label>
					</div>
					<div class="col-md-2">
						<input  type="radio" name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Laki-laki
						
					</div>
					<div class="col-md-2">
						<input type="radio" name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Perempuan
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-1">
						<label> Telpon </label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="input_telp" value="<?php echo set_value('input_telp'); ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-1">
						<label> Alamat </label>
					</div>
					<div class="col-md-8">
						<textarea class="form-control textarea" name="input_alamat"><?php echo set_value('input_alamat'); ?></textarea>
					</div>
				</div>
				
			</div>
		
			<hr>
			<input  type="submit" class="btn btn-success" name="submit" value="Simpan"/>
			<a href="<?php echo base_url(); ?>">
			<input class="btn btn-warning" type="button" value="Batal"></a>
	
	
			<?php echo form_close(); ?>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>      
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropimg.js"></script> 
    <script type="text/javascript">
	</script>
	</body>
</html>

