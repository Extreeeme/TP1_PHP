<?php 

App::getInstance()->getTable('Utilisateur')->delete($_POST['id']);
header('location: index.php?p=utilisateurs');

?>