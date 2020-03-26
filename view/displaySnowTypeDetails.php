<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

ob_start();
$title = "RentASnow - Snows";
require_once "helpers.php";
?>

<div class="text-center">
    <img src="view/images/Snows/<?= $snowtype['photo'] ?>" class="imagedetail" alt="">
    <h2><?= $snowtype['brand'] ?> <?= $snowtype['model'] ?></h2>
    <br>
</div>
<div>
    <?php if (count($snows) > 0) { ?>
        <h3>Nous avons <?= count($snows) ?> snowboards de ce type</h3>
        <table class="table">
            <tr>
                <th>Code</th>
                <th>Taille</th>
                <th>Etat</th>
                <th>Disponible</th>
            </tr>
            <?php foreach ($snows as $snow) { ?>
                <tr>
                    <td><?= $snow['code'] ?></td>
                    <td><?= $snow['length'] ?></td>
                    <td><?= getTextState($snow['state']) ?></td>
                    <td><?= ($snow['available'] == 1) ? 'Oui' : 'Non' ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <h2>Nous n'avons malheureusement aucun snowboard de ce type</h2>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
