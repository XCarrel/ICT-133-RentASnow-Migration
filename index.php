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
    case 'home':
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
    case 'displaySnowTypeDetails':
        $snowtypeid = $_GET['id'];
        displaySnowTypeDetails($snowtypeid);
        break;
    case 'displaySnowDetails':
        $snowid = $_GET['id'];
        displaySnowDetails($snowid);
        break;
    case 'editSnowDetails':
        $snowid = $_GET['snowid'];
        editSnowDetails($snowid);
        break;
    case 'saveSnowDetails':
        // TODO traiter le POST
        $_SESSION['flashmessage']='OK';
        $snowid = $_POST['snowid'];
        displaySnowDetails($snowid);
        break;
    case 'modifyflie':
        modifyfile();
        break;
    case 'changeUser':
        changeUser();
        break;
    case 'delete':
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
