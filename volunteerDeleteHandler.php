<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

//Delete volunteer entirely from database
$id = $_POST['delVol'];
$dao->deleteVolunteer($id);
$_SESSION['messageSuccess'][]= "Volunteer has been deleted successfully!";
$send_to =  $dao->getEmails();
$subject = "Volunteer Deletion";
$message = "A volunteer has been deleted by " . $_SESSION['username'] . ".";
header('Location: /adminVolunteer.php');
exit();
