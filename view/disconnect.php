<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 15.01.2020
 * Time: 10:34
 */
ob_start();
$title = "RentASnow - Déconnecter";
?>
<h1>Vous avez été déconnecter</h1>
<?php
$content = ob_get_clean();
require "gabarit.php";
?>
