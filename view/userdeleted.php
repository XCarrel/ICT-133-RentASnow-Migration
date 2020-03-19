<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

ob_start();
$title = "RentASnow - User Deleted";
?>
<div class="">
<h1 style="color:white">Utilisateur supprimé avec succès !</h1>
<h1 style="margin-top: -80px">Utilisateur supprimé avec succès !</h1>

    <h2 class="text-danger"><a href="index.php?action=modifyflie">Retour à la page précédente.</a></h2>
</div>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
