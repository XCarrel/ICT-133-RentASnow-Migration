<?php
/**
 * File : Helpers.php
 * Author : X. Carrel
 * Created : 2020-03-19
 * Modified last :
 **/

function getFlashMessage()
{
    if (isset($_SESSION['flashmessage']))
    {
        $msg = $_SESSION['flashmessage'];
        unset($_SESSION['flashmessage']);
        return "<div class='alert alert-info'>$msg</div>";
    }
    else
    {
        return null;
    }
}
?>
