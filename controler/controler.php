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
    if(passwordIsGood($email,$password))
    {
        require_once 'view/home.php';
    }
    else
    {
        require_once 'view/connect.php';
    }
}

function displaySnowDetails($id){
    $snow = getSnow($id);
    require_once 'view/displaySnowDetails.php';
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
