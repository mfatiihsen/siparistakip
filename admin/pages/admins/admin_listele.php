<?php
$title = "Yöneticiler";
ob_start();
?>


<?php require_once "../../islem/baglanti.php" ?>




    <main>
        <table class="table table-light table-hover rounded">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>İSİM</th>
                    <th>SOYİSİM</th>
                    <th>TELEFON</th>
                    <th>E-POSTA</th>
                    <th>ADMIN SİL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $admin = $baglanti->prepare("SELECT * FROM  admin order by admin_id ASC");
                $admin->execute();
                while ($admincek = $admin->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr class="item">
                        <td><?php echo $admincek['admin_id'] ?></td>
                        <td><?php echo $admincek['admin_adi'] ?></td>
                        <td><?php echo $admincek['admin_soyad'] ?></td>
                        <td><?php echo $admincek['admin_tel'] ?></td>
                        <td><?php echo $admincek['admin_mail'] ?></td>
                        <td><?php if ($admincek['admin_yetki'] == 2) { ?>

                                <a href="islem/islem.php?adminsil&id=<?php echo $admincek['admin_id'] ?>"><button
                                        class="btn-sil" type="button">Sil</button></a>
                            <?php } else { ?>
                                <a href=""><button
                                        class="btn-silinmez" type="submit">Yönetici</button></a>
                            <?php } ?>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>

    </main>


</section>

<?php
$content = ob_get_clean();
include('../../includes/_layout.php');
?>