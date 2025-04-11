<?php
isUserLoggedIn();
require_once ROOT_PATH . "/helpers/responsable.helpers.php";

define("PATH_VIEW_RP", "/views/pages/responsable/");
$controller = initController();
extract($controller);

switch ($page) {
    case 'dashboard':
        $contenue = "Dashboard";
        $data = getDashboardData();
        extract($data);
        break;
    case 'oeuvres':
        $contenue = "Oeuvres";
        $data = handleOeuvreGetData();
        extract($data);
        break;
    case 'auteurs':
        break;
    case 'rayons':
        $data = getAllRayons();
        break;
    case 'exemplaires':
        $data = handleExemplairesGetData();
        extract($data);
        break;
    default:
        redirectURL("notFound", "error");
        break;
}
ob_start();
require_once ROOT_PATH . PATH_VIEW_RP . ($page === 'dashboard' ? 'dashboard.html.php' : "{$page}.html.php");
$content = ob_get_clean();
require_once ROOT_PATH . "/views/layout/public.layout.php";
