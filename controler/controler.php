<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */

require_once 'model/model.php';

// This file contains nothing but functions

function home()
{
    $news = getNews();
    require_once 'view/home.php';
}
function displaySnows()
{
    $snows = getSnows();
    require_once 'view/displaySnows.php';
}
function connect()
{
    require_once 'view/connect.php';
}
function disconnect()
{
    unset($_SESSION);
    require_once 'view/home.php';
}

function tryLogin($email,$password)
{
    $user = getUserByEmail($email);
    if(password_verify($password,$user['password']))
    {
        $_SESSION['flashmessage'] = "Bienvenue, ".$user['firstname'];
        unset($user['password']);
        $_SESSION['user'] = $user;
        require_once 'view/home.php';
    }
    else
    {
        $_SESSION['flashmessage'] = "Pas d'accord";
        unset($_SESSION['user']);
        require_once 'view/connect.php';
    }
}

function displaySnowTypeDetails($id){
    $snowtype = getSnowType($id);
    $snows = getSnowsOfType($id);
    require_once 'view/displaySnowTypeDetails.php';
}

function displaySnowDetails($snowid){
    $snow = getSnow($snowid);
    $rents = getRentsOfSnow($snowid);
    require_once 'view/displaySnowDetails.php';
}

function emptyCart()
{
    foreach ($_SESSION['cart'] as $snow) {
        returnSnow($snow['id']);
    }
    unset($_SESSION['cart']);
    $_SESSION['flashmessage'] = "Le panier a été vidé";
    displaySnows();
}

/**
 * Create rents with the content of the cart
 * @param $cartContent
 */
function rentSnows($cartContent)
{
    $rentid = createRent($_SESSION['user']['id']);
    foreach ($cartContent as $snow)
    {
        addSnowToRent($snow,$rentid);
    }
    unset($_SESSION['cart']);
    $_SESSION['flashmessage'] = "Location enregistrée";
    displaySnows();
}

function editSnowDetails($snowid){
    $snow = getSnow($snowid);
    require_once 'view/editSnowDetails.php';
}

function modifyfile()
{
    $tab=getUsers();
    require_once 'view/modifyflie.php';
}

function changeUser()
{
    $id=$_GET['id'];
    $modify = getUsers();
    $modify[$id-1]['username'] = $_POST['newusername']; // update
    putUsers($modify);
    $tab = getUsers();
    require_once 'view/modifyflie.php';
}
function delete(){
    $id=$_GET['id'];
    $modify = getUsers();
    unset($modify[$id-1]);
    putUsers($modify);
    require_once 'view/userdeleted.php';
}
?>
