<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

ob_start();
$title = "RentASnow - Snows";
?>
<div class="row-fluid">
    <h1>Nos Snowboards :</h1>
    <?php foreach ($snows as $snow) {?>
        <div class="case_snow">
            <img src="view/images/Snows/<?= $snow['photo'] ?>" class="listimages" alt="">
            <h2>Marque : <?= $snow['brand'] ?></h2>
            <h2>Model : <?= $snow['model'] ?></h2>
            <a href="index.php?action=displaySnowDetails&id=<?= $snow['id'] ?>" style="text-decoration: underline;color: #4DB9EE">Voir Plus</a>
        </div>
        <hr>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
