<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

$id = $_POST['btn'];
$dao->rejectMealIdea($id);
$_SESSION['messagePending'][]= "Meal idea has been rejected";
$send_to =  $dao->getEmails();
$subject = "Meal Idea Rejected";
$message = "A meal idea has been rejected " . $_SESSION['username'] . ".";
header('Location: /adminMealIdeas.php');
exit();
