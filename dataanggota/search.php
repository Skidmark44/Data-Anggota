<?php // --> tadi salah
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<DOCTYPE! html>
<html>
<head>
<title> Cari Data Anggota </title>
</head>
<h1>Pencarian</h1>
	<form action="" method="post">
		<input type="text" name="kata_kunci" placeholder="Masukkan kata kunci" />
		<input type="submit" name="submit" value="Cari" />
	</form>

	<?php
	//jika tombol Cari di klik akan menjalankan script berikutnya
	if(isset($_POST['submit'])){
		//membuat variabel $kata_kunci yang menyimpan data dari inputan kata kunci

		$kata_kunci = $_POST['kata_kunci'];


			//melakukan query ke database dengan SELECT, dan dimana WHERE ini mengambil dari $where
			$results = mysqli_query($koneksi, "SELECT * FROM `karyawan` WHERE nama LIKE '%$kata_kunci%'");
			//menghitung jumlah hasil query di atas

			//jika tidak ada hasil
			if(mysqli_num_rows($results) == 0){
				//pesan jika tidak ada hasil
				echo '<p>Pencarian dengan kata kunci <b>'.$kata_kunci.'</b> tidak ada hasil.</p>';
			}else{
				//pesan jika ada hasil pencarian
				echo '<p>Pencarian dari kata kunci <b>'.$kata_kunci.'</b> mendapatkan hasil:</p>';
				//perulangan untuk menampilkan data
				foreach($results as $row) {
					//menampilkan data
					echo "
					<form action='profile.php'>
						<input type= hidden value =$row[nbp] nama='nbp'>
						<input type='submit' value=$row[nama]> 
					</form>
					";

				}
			}
		}

	?>

</body>
</html>
