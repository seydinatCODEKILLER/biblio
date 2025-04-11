<?php

function getAllRayons(array $filters = [], int $page = 1, int $perPage = 10)
{
    $sql = "SELECT * FROM rayons";
    $where = [];
    $params = [];

    if (!empty($filters['nom'])) {
        $where[] = "nom LIKE ?";
        $params[] = '%' . $filters['nom'] . '%';
    }

    if (!empty($where)) {
        $sql .= " WHERE " . implode(" AND ", $where);
    }

    $sql .= " ORDER BY nom ASC";

    return paginateQuery($sql, $params, $page, $perPage);
}
