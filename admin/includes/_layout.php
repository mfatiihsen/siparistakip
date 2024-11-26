
<?php require_once '../../auth/checkAuth.php'  ?>

<!DOCTYPE html>
<html lang="tr">


<?php include('_head.php') ?>



<body style="background-color:#f1f1f1">
    <?php


    include('_sidebar.php'); ?>

    <section id="content">
        <?php include('_navbar.php'); ?>
        <?php
        echo $content;
        ?>


    </section>


    <?php include('_script.php'); ?>


</body>

</html>