<?php
require_once ROOT_PATH . "/models/oeuvre.model.php";
require_once ROOT_PATH . "/models/rayon.model.php";
require_once ROOT_PATH . "/models/auteur.model.php";

function initController()
{
    clearFieldErrors();

    return [
        'page' => $_GET['page'] ?? 'liste',
        'message' => getSuccess(),
        'errors' => getFieldErrors()
    ];
}

function handleGetDataCatalogue(): array
{
    $data = [
        'filtered' => [
            'rayon_id' => isset($_GET["rayon_id"]) ? $_GET["rayon_id"] : "",
            'auteur_id' => isset($_GET["auteur_id"]) ? $_GET["auteur_id"] : "",
            'search' => isset($_GET["search"]) ? $_GET["search"] : "",
        ],
        'auteurs' => getAllAuteurs(),
        'rayons' => getAllRayons()
    ];
    $data["oeuvres"] = getAllOuvrages($data["filtered"]);
    return $data;
}
