<?php

function getAllOuvrages(array $filters = [], int $page = 1, int $perPage = 5): array
{
    $sql = "SELECT o.id, o.code, o.titre, o.date_edition, o.editeur, o.langue, 
            o.image_couverture, o.nombre_pages, 
            r.nom AS rayon,
            GROUP_CONCAT(DISTINCT CONCAT(a.prenom, ' ', a.nom) SEPARATOR ', ') AS auteurs,
            GROUP_CONCAT(DISTINCT mc.mot SEPARATOR ', ') AS mots_cles
            FROM ouvrages o
            JOIN rayons r ON o.rayon_id = r.id
            LEFT JOIN auteur_ouvrage ao ON o.id = ao.ouvrage_id
            LEFT JOIN auteurs a ON ao.auteur_id = a.id
            LEFT JOIN mot_cle_ouvrage mco ON o.id = mco.ouvrage_id
            LEFT JOIN mots_cles mc ON mco.mot_cle_id = mc.id
            WHERE 1=1";

    $where = [];
    $params = [];

    if (!empty($filters['search'])) {
        $where[] = "(o.titre LIKE ? OR o.code LIKE ?)";
        $params[] = '%' . $filters['search'] . '%';
        $params[] = '%' . $filters['search'] . '%';
    }

    if (!empty($filters['rayon_id'])) {
        $where[] = "o.rayon_id = ?";
        $params[] = $filters['rayon_id'];
    }

    if (!empty($filters['auteur_id'])) {
        $where[] = "a.id = ?";
        $params[] = $filters['auteur_id'];
    }

    if (!empty($filters['mot_cle_id'])) {
        $where[] = "mc.id = ?";
        $params[] = $filters['mot_cle_id'];
    }

    if (!empty($where)) {
        $sql .= " AND " . implode(" AND ", $where);
    }

    $sql .= " GROUP BY o.id";
    $sql .= " ORDER BY o.titre ASC";

    return paginateQuery($sql, $params, $page, $perPage);
}
