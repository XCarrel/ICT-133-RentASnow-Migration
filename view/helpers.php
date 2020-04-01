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

function getTextState($state)
{
    switch ($state)
    {
        case 1:
            return 'Neuf';
            break;
        case 2:
            return 'Usagé';
            break;
        case 3:
            return 'Vieux';
            break;
        case 4:
            return 'Mort';
            break;
        default:
            return '???';
    }
}

/**
 * This function returns the HTML for the cart button, depending on the cart's content
 */
function cartButton()
{
    if (!isset($_SESSION['cart'])) {
        return "<a class='btn btn-secondary ml-3 disabled'>Panier</a>";
    } else {
        return "<a href='?action=viewCart' class='btn btn-secondary ml-3'>Panier</a>";
    }
}
?>
