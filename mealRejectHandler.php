<?php
session_start();

require_once 'Dao.php';
$id = $_POST['btn'];
$dao = new Dao();
$dao->rejectMealIdea($id);
header('Location: /adminMealIdeas.php');
exit();