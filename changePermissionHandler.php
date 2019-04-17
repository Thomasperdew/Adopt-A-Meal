<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

$id = $_POST['change'];
$bad = false;
$permission = $_SESSION['super_user'];

if(!$permission){
    $bad = true;
    $_SESSION['messages'][] = "You don't have permissions to change admins permission";
}

if ($bad) {
    header('Location: /adminManage.php');
    $_SESSION['validated'] = 'bad';
    exit;
}

$dao->changePermission($id);
$_SESSION['messageSuccess'][] = "Admins permissions successfully updated!";
$send_to =  $dao->getEmails();
$subject = "Admin Permissions Changed";
$message = $username . " has had their administrator permissions updated.";
header('Location: /adminManage.php');
exit();
