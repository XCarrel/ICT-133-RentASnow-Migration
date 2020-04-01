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
    <form method="post" action="?action=saveSnowDetails">
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
        <input type="hidden" name="snowid" value="<?= $snowid ?>">
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
