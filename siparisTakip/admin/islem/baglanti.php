


<?php
#veri tabanı ile bağlantı işlemi

try {
	$baglanti= new PDO("mysql:host=localhost; dbname=siparistakip",   'root', ''     );
	#echo "bağlantı başarılı";
} catch (Exception $e) {
	
	echo $e->getMessage();
}





