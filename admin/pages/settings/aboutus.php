<?php
$title = "Hakkımızda Ayarları";
ob_start();
?>



<section id="content">

	<main>
		<div class="container">
			<form action="../../islem/islem.php" method="POST">

				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input required name="adisoyadi" placeholder="Alıcı Adı ve Soyadı:" type="text"
						class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input required name="telefon" placeholder="Alıcı Telefon Numarası:" type="text"
						class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input required name="mail" placeholder="Alıcı Mail:" type="text" class="form-control"
						id="exampleInputPassword1">
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Bilgilerin doğru olduğuna eminim</label>
				</div>

				<button type="submit" class="btn btn-primary" name="siparisekle" id="submitBtn">Ekle</button>
			</form>
		</div>

	</main>

</section>


<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>