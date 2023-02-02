<?php
require '../functions/loadTemplate.php';
require '../database.php';
require '../classes/DatabaseTable.php';
require '../Controllers/JobsController.php';
require '../Controllers/CategoryController.php';

$jobsTable = new DatabaseTable($pdo, 'jobs', 'id');
$categoriesTable = new DatabaseTable($pdo, 'category', 'id');
$controllers = []; 
$controllers['job'] = new jobsController($jokesTable);
$controllers['category'] =  new CategoryController($categoriesTable);

$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if ($route == '') {
        $page = $controllers['job']->home();
}
else {
        list($controllerName, $functionName) = explode('/', $route);
        $controller = $controllers[$controllerName];
        $page = $controller->$functionName();

}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require  '../templates/layout.html.php';
