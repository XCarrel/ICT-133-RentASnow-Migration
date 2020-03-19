<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

ob_start();
$title = "RentASnow - Connect";
?>

<div style="margin-top: 100px">
    <form method="post" action="index.php?action=tryLogin">
    <table class="table">
        <tr>
            <td><label for="username">email : </label></td>
            <td><input id="username" name="email" type="email" placeholder="Entrer votre email ici..."></td>
        </tr>
        <tr>
            <td><label for="password">Mot de passe : </label></td>
            <td><input id="password" name="password" type="password" placeholder="Entrer votre mot de passe ici..."></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Se connecter</button></td>
        </tr>
    </table>
</form>
</div>
<?php

$content = ob_get_clean();
require "gabarit.php";
?>
