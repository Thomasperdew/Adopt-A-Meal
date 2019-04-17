<?php
session_start();
$to_email_address = "jaimeguevara@u.boisestate.edu" ; // We need to fill this with DB emails
$subject = "Volunteer Accepted";

require_once 'Dao.php';
$id = $_POST['accVol'];
$dao = new Dao();
$dao->acceptVolunteer($id);
$date = $dao->getVolunteerDateByID($id);
// $dao->rejectNonAcceptedVolunteers($id, $date);
$dao->removeDate($date);
$_SESSION['messageSuccess'][]= "Volunteer event has been accepted";
$message = "A meal idea, for the following date: " . $date . ", has been accepted by " . $_SESSION['username'] . ".";
mail($to_email_address,$subject,$message);
header('Location: /adminVolunteer.php');
exit();
