<?php
include_once 'config.php';
include_once 'header.php';
include_once 'footer.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'product'; 
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; 

$controllerClass = ucfirst($controller) . 'Controller';

$controllerFile = "controllers/$controllerClass.php";
if (file_exists($controllerFile)) {
    include_once $controllerFile;
    $controllerInstance = new $controllerClass();
    $controllerInstance->$action();
} else {
    echo "Controller not found.";
}
?>
