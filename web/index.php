<?php
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}

//////////////bouton connect 
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if ($auth->logged()) {
	$connect = "disconnect";
}else{
	$connect = "login";
}
/////////////////////////

ob_start();
if ($page==='home') {
	require ROOT.'/pages/index.php';
	//Suite page utilisateurs
}elseif ($page==='utilisateurs') {
	require ROOT.'/pages/utilisateurs/index.php';
	//Suite page users
}elseif ($page==='utilisateurs.services') {
	require ROOT.'/pages/utilisateurs/services.php';
	//Suite page users
}elseif ($page==='login') {
	require ROOT.'/pages/users/login.php';
}elseif ($page==='disconnect') {
	require ROOT.'/pages/users/disconnect.php';
	//Suite page errors
}elseif ($page==='403') {
	require ROOT.'/pages/errors/403.php';
}else{ //404
	require ROOT.'/pages/errors/404.php';
}
$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 