<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$send_to =  $dao->getEmails();
$subject = "Volunteer Accepted";

//Accept volunteer.. remove date from available dates for volunteer from main page
$id = $_POST['accVol'];
$dao->acceptVolunteer($id);
$date = $dao->getVolunteerDateByID($id);
// $dao->rejectNonAcceptedVolunteers($id, $date);
$dao->removeDate($date);
$message = "A meal idea, for the following date: " . $date . ", has been accepted by " . $_SESSION['username'] . ".";
mail($send_to,$subject,$message);
$_SESSION['messageSuccess'][]= "Volunteer event has been accepted!";
header('Location: /adminVolunteer.php');
exit();
