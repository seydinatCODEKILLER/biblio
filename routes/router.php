<?php

$controllers = [
    "security" => "security.controller.php",
    "responsable" => "responsable.controller.php",
    "public" => "catalogue.controller.php",
    "notFound" => "notFound.controller.php"
];

function handleController(string $key)
{
    global $controllers;
    if (array_key_exists($key, $controllers)) {
        $controller = $controllers[$key];
        $controllerFile = ROOT_PATH . "/controllers/$controller";
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            redirectURL("notFound", "error");
        }
    } else {
        redirectURL("public", "liste");
    }
}
