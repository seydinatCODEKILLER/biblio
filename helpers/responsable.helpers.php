<?php

require_once ROOT_PATH . "/models/responsable.model.php";
require_once ROOT_PATH . "/models/oeuvre.model.php";
require_once ROOT_PATH . "/models/exemplaire.model.php";


function initController()
{
    isUserLoggedIn();
    clearFieldErrors();

    return [
        'page' => $_GET['page'] ?? 'dashboard',
        'role' => getDataFromSession("user", "libelle"),
        'contenue' => '',
        'message' => getSuccess(),
        'errors' => getFieldErrors()
    ];
}

function handleOeuvreGetData()
{
    $data = [
        'filtered' => [],
    ];
    $data["oeuvres"] = getAllOuvrages();
    return $data;
}

function handleRayonGetData()
{
    $data = [
        'filtered' => [],
    ];
    $data["rayons"] = getAllRayons();
    return $data;
}

function handleExemplairesGetData()
{
    $data = [
        'filtered' => [],
    ];
    $data["exemplaires"] = getAllExemplaires();
    return $data;
}

function getDashboardData()
{
    return getCardStaticDashboard();
}
