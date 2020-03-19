<?php
ob_start();
$title = "RentASnow - Edit File";
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */
?>
 <?php
 $delete = $_GET['delete'];
 $modify = $_GET['modify'];
 if ($modify == false) {?>
<table class="table" style="text-align: center" border="1px">

    <th>Identifiant</th>
    <th>Id</th>
    <th>Supprimer</th>
    <th>Modifier</th>
 <?php }?>

    <?php

    if ($modify == false) {
        foreach ($tab as $element) {
            ?>

            <tr>
                <td><?= $element['username'] ?></td>
                <td><?= $element['id'] ?></td>
                <td><a href="index.php?action=delete&id=<?= $element['id'] ?>">
                        <button type="submit" class="btn btn-danger">Suppr</button>
                    </a></td>
                <td>
                    <a href="index.php?action=modifyflie&modify=true">
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </a>
                </td>
            </tr>
        <?php }
    } ?>
</table>
<?php if ($modify == true){ ?>
<hr>
<table class="table" style="text-align: center" border="1px">
    <thead>
    <th>Avant</th>
    <th>Après</th>
    <th>Id</th>
    <th>Terminer</th>
    </thead>
    <?php } ?>
    <?php if ($modify == true) {
        foreach ($tab as $element) { ?>
            <tr>
                <form action="index.php?action=changeUser&id=<?= $element['id'] ?>" method="post">
                    <td><?= $element['username'] ?></td>
                    <td><input type="text" name="newusername"></td>
                    <td><?= $element['id'] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </td>
                </form>
            </tr>

        <?php }
    } ?>
</table>
<?php if ($delete == true) { ?>
<?php } ?>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
