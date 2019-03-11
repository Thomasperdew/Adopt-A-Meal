<?php
session_start();

// Got here, means everything validated, and the comment will post.
require_once 'Dao.php';
$dao = new Dao();
$dao->mealIdea($mealName, $description, $ingredients, $instructions, $source, $yourName, $email);
exit;