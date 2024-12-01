<?php
require_once '../../islem/baglanti.php';

// ana sayfada bulunan sipariş sayılarını göstermek için veri tabanından çektiğimiz veriler
$toplamSiparisSorgu = $baglanti->query("SELECT COUNT(*) as toplam FROM siparis");
$toplamSiparis = $toplamSiparisSorgu->fetch(PDO::FETCH_ASSOC)['toplam'];


$bekleyenSiparisSorgu = $baglanti->query("SELECT COUNT(*) as bekleyen FROM siparis WHERE siparis_durum='YOLDA' OR  siparis_durum='TESLİM ALINDI'");
$bekleyenSiparis = $bekleyenSiparisSorgu->fetch(PDO::FETCH_ASSOC)['bekleyen'];

$teslimEdilenSorgu = $baglanti->query("SELECT COUNT(*) as teslim_edilen FROM siparis WHERE siparis_durum='TESLİM EDİLDİ'");
$teslimEdilen = $teslimEdilenSorgu->fetch(PDO::FETCH_ASSOC)['teslim_edilen'];

$dagitimSorgu = $baglanti->query("SELECT COUNT(*) as dagitimda FROM siparis WHERE siparis_durum='DAĞITIMDA'");
$dagitimdakiler = $dagitimSorgu->fetch(PDO::FETCH_ASSOC)['dagitimda'];


// Verileri JavaScript'e aktarmak için JSON formatında encode etme
$siparisVerileri = json_encode([
	'toplam' => $toplamSiparis,
	'bekleyen' => $bekleyenSiparis,
	'teslim_edilen' => $teslimEdilen,
	'dagitimdakiler' => $dagitimdakiler
]);


$sonSiparislerSorgu = $baglanti->query("SELECT * FROM siparis ORDER BY siparis_id DESC LIMIT 5");
$siparisler = $sonSiparislerSorgu->fetchAll(PDO::FETCH_ASSOC);




// Veritabanı durumunu kontrol et
if ($baglantiDurumu == "Bağlantı Başarılı") {
	// Performans bilgilerini al
	$sql = "SHOW STATUS LIKE 'Uptime'";
	$query = $baglanti->query($sql);
	$uptime = $query->fetch(PDO::FETCH_ASSOC);

	$sqlQueries = "SHOW STATUS LIKE 'Queries'";
	$queryCount = $baglanti->query($sqlQueries);
	$queryCountResult = $queryCount->fetch(PDO::FETCH_ASSOC);

	$uptimeValue = $uptime['Value']; // Sunucunun çalışmaya başladığı süre
	$queryCountValue = $queryCountResult['Value']; // Toplam yapılan sorgu sayısı
} else {
	$uptimeValue = "Veritabanı Bağlantısı Sağlanamadı";
	$queryCountValue = "Veritabanı Bağlantısı Sağlanamadı";
}


$sorgu = $baglanti->query("SHOW STATUS LIKE 'Queries'");

// Sorgu sayısını alıyoruz
$queryCount = $sorgu->fetch(PDO::FETCH_ASSOC)['Value'];


// Query Cache Hits (Cache'e alınan sorgular)
$qcacheHitsSorgu = $baglanti->query("SHOW STATUS LIKE 'Qcache_hits'");
$qcacheHits = $qcacheHitsSorgu->fetch(PDO::FETCH_ASSOC)['Value'];

// Query Cache Insertion (Cache'e eklenen sorgular)
$qcacheInsertsSorgu = $baglanti->query("SHOW STATUS LIKE 'Qcache_inserts'");
$qcacheInserts = $qcacheInsertsSorgu->fetch(PDO::FETCH_ASSOC)['Value'];

?>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main>
	<h1 class="title">Kontrol Paneli</h1>

	<div class="info-data">
		<div class="card">
			<div class="head">
				<div>
					<h2><?php echo $toplamSiparis ?></h2>
					<p>Toplam Sipariş Sayısı</p>
				</div>
				<i class='bx bx-trending-up icon'></i>
			</div>
			<span class="progress" data-value="40%"></span>
			<span class="label">40%</span>
		</div>
		<div class="card">
			<div class="head">
				<div>
					<h2><?php echo $teslimEdilen ?></h2>
					<p>Tamamlanan Siparişler</p>
				</div>
				<i class='bx bx-trending-down icon down'></i>
			</div>
			<span class="progress" data-value="60%"></span>
			<span class="label">60%</span>
		</div>
		<div class="card">
			<div class="head">
				<div>
					<h2><?php echo $bekleyenSiparis ?></h2>
					<p>Devam Eden Siparişler</p>
				</div>
				<i class='bx bx-trending-up icon'></i>
			</div>
			<span class="progress" data-value="30%"></span>
			<span class="label">30%</span>
		</div>
		<div class="card">
			<div class="head">
				<div>
					<h2><?php echo $dagitimdakiler ?></h2>
					<p>Dağıtımdakiler</p>
				</div>
				<i class='bx bx-trending-up icon'></i>
			</div>
			<span class="progress" data-value="80%"></span>
			<span class="label">80%</span>
		</div>
	</div>
	<div class="server-status">
		<div class="tablo-veri">
			<h3>Veritabanı Durumu</h3>
			<p><strong>Bağlantı Durumu:</strong> <?php echo $baglantiDurumu ?></p>
			<p><strong>Sunucu Çalışma Süresi:</strong> <?php echo gmdate("H:i:s", $uptimeValue); ?></p>
			<p><strong>Toplam Yapılan Sorgular:</strong> <?php echo $queryCountValue; ?></p>
			<!-- Veritabanı Boyutu -->
			<?php
			// Veritabanı boyutunu sorgulama
			$sorgu = $baglanti->query("SELECT ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'Boyut (MB)' FROM information_schema.tables WHERE table_schema = 'siparis'");
			$veritabani = $sorgu->fetch(PDO::FETCH_ASSOC);
			$veritabaniBoyutu = $veritabani['Boyut (MB)'];
			?>
			<p><strong>Veritabanı Boyutu:</strong> <?php echo $veritabaniBoyutu; ?> MB</p>
		</div>

		<div class="tablo-veri">
			<h3>Tablo Boyutları:</h3>
			<?php
			$sorgu = $baglanti->query("SELECT table_name AS 'Tablo Adı',
                                          ROUND((data_length + index_length) / 1024 / 1024, 2) AS 'Boyut (MB)'
                                       FROM information_schema.tables
                                       WHERE table_schema = 'siparis'");

			while ($sonuc = $sorgu->fetch(PDO::FETCH_ASSOC)) {
				echo "<p><strong>" . $sonuc['Tablo Adı'] . ":</strong> " . $sonuc['Boyut (MB)'] . " MB</p>";
			}
			?>
		</div>

		<div class="tablo-veri">
			<h3>Sorgu:</h3>
			<p><strong>Toplam Yapılan Sorgular:</strong> <?php echo $queryCount; ?></p>
			<p><strong>Cache Hits:</strong> <?php echo $qcacheHits; ?></p>
			<p><strong>Cache'e Eklenen Sorgular:</strong> <?php echo $qcacheInserts; ?></p>
		</div>

	</div>


	<div class="data">
		<div class="content-data">
			<div class="head">
				<h3>Sipariş Grafiği</h3>
				<div class="menu">
					<i class='bx bx-dots-horizontal-rounded icon'></i>
					<ul class="menu-link">
						<li><a href="#">Düzenle</a></li>
						<li><a href="#">Kaydet</a></li>
						<li><a href="#">Sil</a></li>
					</ul>
				</div>
			</div>
			<div style="width: 70%; margin: auto;">
				<canvas id="siparisDurumuGrafik"></canvas>
			</div>
		</div>
		<div style="width: 20px;"></div>
		<div class="content-data">
			<div class="head">
				<h3>En Son 5 Sipariş</h3>
			</div>
			<div class="recent-orders-container">
				<div class="order-cards">
					<?php foreach ($siparisler as $siparis): ?>
						<div class="order-card">
							<div class="order-header">
								<h5 class="order-title">Sipariş No: <?php echo $siparis['siparis_id']; ?></h5>
								<span class="order-status <?php echo strtolower(str_replace(' ', '-', $siparis['siparis_durum'])); ?>">
									<?php echo $siparis['siparis_durum']; ?>
								</span>
							</div>
							<div class="order-details">
								<p><strong>Alıcı:</strong> <?php echo $siparis['alici_adi_soyadi']; ?></p>
								<p><strong>Telefon:</strong> <?php echo $siparis['alici_tel']; ?></p>
								<p><strong>Email:</strong> <?php echo $siparis['alici_mail']; ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</main>


<script>
	// PHP tarafından gönderilen verileri alıyoruz
	var siparisVerileri = <?php echo $siparisVerileri; ?>;

	// Grafik verileri
	var grafikVerileri = {
		labels: ['Devam Eden ', 'Teslim Edilen ', 'Dağıtımdaki '],
		datasets: [{
			data: [siparisVerileri.bekleyen, siparisVerileri.teslim_edilen, siparisVerileri.dagitimdakiler],
			backgroundColor: ['#FFCD56', '#36A2EB', '#FF6384'],
			hoverBackgroundColor: ['#FFB82B', '#4A90E2', '#FF4C68']
		}]
	};

	var ctx = document.getElementById('siparisDurumuGrafik').getContext('2d');
	var siparisDurumuGrafik = new Chart(ctx, {
		type: 'pie', // Pasta grafiği türü
		data: grafikVerileri
	});
</script>