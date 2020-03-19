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

<div class="case_snow">
    <img src="view/images/Snows/<?= $snow['photo'] ?>" class="listimages" alt="">
    <h2>Marque : <?= $snow['brand'] ?></h2>
    <h2>Model : <?= $snow['model'] ?></h2>
    <br>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
