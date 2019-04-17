<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

$id = $_POST['id'];
$bad = false;
echo $id;
$permission = $_SESSION['super_user'];

if(!$permission){
    $bad = true;
    $_SESSION['messages'][] = "You don't have permissions to delete admins";
}

if ($bad) {
    header('Location: /adminManage.php');
    $_SESSION['validated'] = 'bad';
    exit;
}

$dao->deleteAdmin($id);
$_SESSION['messageSuccess'][] = "Admin successfully deleted!";
$send_to =  $dao->getEmails();
$subject = "Admin Deleted";
$message = $username . " has been removed as an admin by " . $_SESSION['username'] . ".";
header('Location: /adminManage.php');
exit();
