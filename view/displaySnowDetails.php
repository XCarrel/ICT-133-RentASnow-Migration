<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

ob_start();
$title = "RentASnow - Snow";
require_once "helpers.php";
?>

<div class="text-center">
    <img src="view/images/Snows/<?= $snow['photo'] ?>" class="imagedetail" alt="">
    <h2><?= $snow['brand'] ?> <?= $snow['model'] ?></h2>
    <br>
    <table class="table">
        <tr>
            <th>Code</th>
            <td><?= $snow['code'] ?></td>
        </tr>
        <tr>
            <th>Taille</th>
            <td><?= $snow['length'] ?></td>
        </tr>
        <tr>
            <th>Etat</th>
            <td><?= getTextState($snow['state']) ?></td>
        </tr>
        <tr>
            <th>Disponible</th>
            <td><?= ($snow['available'] == 1) ? 'Oui' : 'Non' ?></td>
        </tr>
    </table>
    <a href="?action=editSnowDetails&snowid=<?= $snowid ?>" class="btn btn-primary">Modifier</a>
    <?php if ($snow['available'] == 1) { ?>
        <a href="?action=putInCart&snowid=<?= $snowid ?>" class="btn btn-success">Mettre dans le panier</a>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
