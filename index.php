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
    case 'displaySnows':
        displaySnows();
        break;
    case 'connect':
        connect();
        break;
    case 'disconnect':
        disconnect();
        break;
    case 'tryLogin':
        tryLogin();
        break;
    case 'displaySnowDetails';
        $snowid = $_GET['id'];
        displaySnowDetails($snowid);
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
