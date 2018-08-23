<?php 
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Anggota IARMI &raquo; Tambah Data</h2>
			<h2>DPP DKI Jakarta</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 137 ditekan
				$nbp		     = $_POST['nbp'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat		     = $_POST['alamat'];
				$kelurahan		 = $_POST['kelurahan'];
				$kecamatan		 = $_POST['kecamatan'];
				$no_telepon		 = $_POST['no_telepon'];
				$jabatan		 = $_POST['jabatan'];
				$perti			 = $_POST['perti'];
				$angkatan		 = $_POST['angkatan'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nbp='$nbp'"); // query untuk memilih entri dengan nik terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nik yang akan ditambahkan tidak ada dalam database
					
						$insert = mysqli_query($koneksi, "INSERT INTO karyawan(nbp, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, kelurahan, kecamatan, no_telepon, jabatan, perti, angkatan) VALUES('$nbp','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$kelurahan', '$kecamatan', '$no_telepon', '$jabatan', '$perti', '$angkatan')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Anggota Berhasil Di Simpan.</div>'; // maka tampilkan 'Data Karyawan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Anggota Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data Karyawan Gagal Di simpan!'
						}
										}
				}else{ // mengecek jika nik yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NBP Sudah Ada..!</div>'; // maka tampilkan 'NIK Sudah Ada..!'
				}
			
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NBP</label>
					<div class="col-sm-2">
						<input type="text" name="nbp" class="form-control" placeholder="NBP" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kelurahan</label>
					<div class="col-sm-2">
						<select name="kelurahan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="tanjung duren selatan">Tanjung Duren Selatan</option>
							<option value="tanjung duren barat">Tanjung Duren Barat</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Kecamatan</label>
					<div class="col-sm-2">
						<select name="kecamatan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="grogol petamburan">Grogol Petamburan</option>
							<option value="kemanggisan">Kemanggisan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-2">
						<select name="jabatan" class="form-control" required>
							<option value=""> ---- </option>
							<option value="Ketua">Ketua</option>
							<option value="Wakil">Wakil</option>
							<option value="Anggota">Anggota</option>

							
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Perguruan tinggi</label>
					<div class="col-sm-2">
						<input type="text" name="perti" class="form-control" placeholder="Peguruan Tinggi" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Angkatan</label>
					<div class="col-sm-2">
						<select name="angkatan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Mandala I">Mandala I</option>
							<option value="Kobra I">Kobra I</option>
							<option value="Elang I">Elang I</option>
						</select>
					</div>
				</div>
				
					<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->