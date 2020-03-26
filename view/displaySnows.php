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
    <div class="snows">
        <?php foreach ($snows as $snow) { ?>
            <div class="snow">
                <img src="view/images/Snows/<?= $snow['photo'] ?>" class="listimages" alt=""><br>
                <a href="index.php?action=displaySnowTypeDetails&id=<?= $snow['id'] ?>" style="text-decoration: underline;color: #4DB9EE"><?= $snow['brand'] ?> <?= $snow['model'] ?></a>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
