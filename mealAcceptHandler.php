<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();
$send_to = $dao->getEmails();
$subject = "Meal Idea Accepted";
$message = "A meal idea has been accepted by " . $_SESSION['username'] . ".";

$id = $_POST['btn'];
$dao->acceptMealIdea($id);
$_SESSION['messagePending'][]= "Meal idea has been accepted";
mail($send_to,$subject,$message);
header('Location: /adminMealIdeas.php');
exit();
