<?php
session_start();

require_once 'Dao.php';
$id = $_POST['btn'];
$dao = new Dao();
$dao->acceptMealIdea($id);
$_SESSION['messagePending'][]= "Meal idea has been accepted";
header('Location: /adminMealIdeas.php');
exit();