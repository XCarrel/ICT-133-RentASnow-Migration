<?php
/**
 * Created By PhpStorm
 * User: benoit.pierrehumbert
 * Date: 24.01.2020
 * Time: 16:55
 */
session_start();
require "controler/controler.php";
$action = $_GET['action'];

switch ($action)
{
    case 'home';
        home();
        break;
    case 'displaySnowTypes':
        displaySnows();
        break;
    case 'connect':
        connect();
        break;
    case 'disconnect':
        disconnect();
        break;
    case 'tryLogin':
        $email=$_POST['email'];
        $password=$_POST['password'];
        tryLogin($email,$password);
        break;
    case 'displaySnowTypeDetails';
        $snowid = $_GET['id'];
        displaySnowTypeDetails($snowid);
        break;
    case 'modifyflie';
        modifyfile();
        break;
    case 'changeUser';
        changeUser();
        break;
    case 'delete';
        delete();
        break;
    case '' :
        home();
        break;
    default:
        require_once "view/pagenotfound.php";
        break;
}
?>
