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
    <h1>Votre panier :</h1>
    <table class="table table-striped">
        <tr>
            <th>Snowboard</th>
            <th>Code</th>
            <th>Taille</th>
        </tr>
        <?php foreach ($cartContent as $snow) { ?>
            <tr>
                <td><?= $snow['brand'] ?> <?= $snow['model'] ?></td>
                <td><?= $snow['code'] ?></td>
                <td><?= $snow['length'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
