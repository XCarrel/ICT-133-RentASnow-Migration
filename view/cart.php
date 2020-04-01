<?php
/**
 * Created By PhpStorm
 * User: XCL
 * Date: 1.04.2020
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
    <a href="?action=emptyCart" class="btn btn-danger">Abandonner</a>
    <a href="?action=rentSnows" class="btn btn-success">Louer</a>
</div>
</div>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>
