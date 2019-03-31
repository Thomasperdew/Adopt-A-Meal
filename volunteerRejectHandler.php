<?php
session_start();

require_once 'Dao.php';
$id = $_POST['btn'];
$dao = new Dao();
$dao->rejectVolunteer($id);
$_SESSION['messagePending'][]= "Volunteer event has been rejected";
header('Location: /adminVolunteer.php');
exit();