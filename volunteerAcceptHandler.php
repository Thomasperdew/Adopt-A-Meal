<?php
session_start();

require_once 'Dao.php';
$id = $_POST['accVol'];
$dao = new Dao();
$dao->acceptVolunteer($id);
$date = $dao->getVolunteerDateByID($id);
$dao->rejectNonAcceptedVolunteers($id, $date);
$dao->removeDate($date);
$_SESSION['messagePending'][]= "Volunteer event has been accepted";
header('Location: /adminVolunteer.php');
exit();