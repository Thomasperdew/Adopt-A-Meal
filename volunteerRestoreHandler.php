<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

//Reject volunteer request (change status back to pending)
$id = $_POST['resVol'];
$dao->restoreVolunteer($id);
$_SESSION['messageSuccess'][]= "Volunteer has been restored successfully!";
$send_to =  $dao->getEmails();
$subject = "Volunteer Restored";
$message = "A volunteer has been restored by " . $_SESSION['username'] . ".";
mail($send_to,$subject,$message);
header('Location: /adminVolunteer.php');
exit();
