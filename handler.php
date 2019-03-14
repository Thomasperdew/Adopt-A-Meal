<?php
session_start();

// Got here, means everything validated, and the comment will post.
require_once 'Dao.php';
$dao = new Dao();
$dao->mealIdea($title, $description, $ingredients, $instructions, $external_link, $name, $email);
exit;