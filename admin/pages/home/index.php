
<?php
$title = "Yönetici Paneli";
ob_start();
?>





		<?php require_once '../../includes/_main.php' ?>



	<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>
