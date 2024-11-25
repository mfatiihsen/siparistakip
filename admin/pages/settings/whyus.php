<?php
$title = "Neden Biz? Ayarları";
ob_start();
?>

<section id="content">
	<main>
		<div class="container">
			<form action="../../islem/islem.php" method="POST">
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input value="" required name="adisoyadi" placeholder="1.Kutu" type="text"
						class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input required name="telefon" placeholder="2.Kutu" type="text"
						class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label"></label>
					<input required name="mail" placeholder="3.Kutu" type="text" class="form-control"
						id="exampleInputPassword1">
				</div>

				<button type="submit" class="btn btn-primary" name="siparisekle" id="submitBtn">Ekle</button>
			</form>
		</div>

	</main>

</section>


</section>



<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>