<?php
require_once 'Dao.php';
$dao = new Dao();
session_start();

//Meal idea will be restored
$id = $_POST['id'];
$dao->restoreMealIdea($id);
$_SESSION['messageSuccess'][]= "Meal idea has been restored successfully!";
$send_to = $dao->getEmails();
$subject = "Meal Idea Restored";
$message = "A meal idea that was previously rejected was restored by " . $_SESSION['user'] . ".";
mail($send_to, $subject, $message);
header('Location: /adminMealIdeas.php');
exit();
