<!-- NAVBAR -->
<nav>
	<i class='bx bx-menu toggle-sidebar'></i>
	<form action="#">

	</form>
	<p style="margin: 0; font-weight: normal; color: #333;">
	<?php
	if (isset($_SESSION['admin_adi'])) {
		echo "Hoş Geldin, " . htmlspecialchars($_SESSION['admin_adi']). "!";
	} else {
		echo "Hoş Geldiniz, Admin!";
	}
	?>
	</p>
	<span class="divider"></span>
	<div class="profile">
		<img class="pp" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
			alt="">

		<ul class="profile-link">
			<li><a href="../../pages/loginpage/reset_pass.php" style="text-decoration: none;"><i class=''></i> Şifre Değiştir</a></li>
			<form action="../../islem/islem.php" method="post">
				<li> <button name="logout" type="submit" style="background: none; border: none; cursor: pointer; text-decoration: none; color: inherit; font: inherit; margin-left:25px">
						<i class=''></i> Çıkış Yap
					</button></li>
			</form>
		</ul>
	</div>
</nav>
<!-- NAVBAR -->