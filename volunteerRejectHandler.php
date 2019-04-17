<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

$id = $_POST['rejVol'];
$dao->rejectVolunteer($id);
$_SESSION['messageSuccess'][]= "Volunteer event has been rejected";
$send_to =  $dao->getEmails();
$subject = "Volunteer Rejection";
$message = "A volunteer has been rejected by " . $_SESSION['username'] . ".";
mail($send_to, $subject, $message);
header('Location: /adminVolunteer.php');
exit();
