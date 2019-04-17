<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
//$send_to =  $dao->getEmails();
//$subject = "Volunteer Accepted";

$id = $_POST['accVol'];
$dao->acceptVolunteer($id);
$date = $dao->getVolunteerDateByID($id);
$dao->rejectNonAcceptedVolunteers($id, $date);
$dao->removeDate($date);
<<<<<<< HEAD
$_SESSION['messagePending'][]= "Volunteer event has been accepted";
=======
$_SESSION['messageSuccess'][]= "Volunteer event has been accepted";
>>>>>>> 7be848032104e3de107f103e1db511003feb3b69
$message = "A meal idea, for the following date: " . $date . ", has been accepted by " . $_SESSION['username'] . ".";
//mail($send_to,$subject,$message);
header('Location: /adminVolunteer.php');
exit();
