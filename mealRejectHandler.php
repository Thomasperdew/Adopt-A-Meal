<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

//Meal idea will be rejected
$id = $_POST['btn'];
$dao->rejectMealIdea($id);
$_SESSION['messageSuccess'][]= "Meal idea has been rejected";
$send_to =  $dao->getEmails();
$subject = "Meal Idea Rejected";
$message = "A meal idea has been rejected " . $_SESSION['username'] . ".";
header('Location: /adminMealIdeas.php');
exit();
