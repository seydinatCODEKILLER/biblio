<?php

function getAllExemplaires(array $filters = [], int $page = 1, int $perPage = 4)
{
    $sql = "SELECT id, code, etat, date_enregistrement, statut FROM exemplaires";
    $where = [];
    $params = [];

    // Filtres optionnels
    if (!empty($filters['etat'])) {
        $where[] = "etat = ?";
        $params[] = $filters['etat'];
    }

    if (!empty($filters['statut'])) {
        $where[] = "statut = ?";
        $params[] = $filters['statut'];
    }

    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    $sql .= " ORDER BY date_enregistrement DESC";

    return paginateQuery($sql, $params, $page, $perPage);
}
