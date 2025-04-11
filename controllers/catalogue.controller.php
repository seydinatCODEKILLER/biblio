<?php
require_once ROOT_PATH . "/helpers/catalogue.helpers.php";

define("PATH_VIEW_RP", "/views/pages/visiteurs/");
$controller = initController();
extract($controller);

switch ($page) {
    case 'liste':
        $data = handleGetDataCatalogue();
        extract($data);
        $ouvrages = $data["oeuvres"]["data"];
        $paginations = $data["oeuvres"]["pagination"];
        break;
    default:
        redirectURL("notFound", "error");
        break;
}
ob_start();
require_once ROOT_PATH . PATH_VIEW_RP . "liste.html.php";
$content = ob_get_clean();
require_once ROOT_PATH . "/views/layout/visiteur.layout.php";
