<?php

function buildConditions($filters) {
    $conditions = "1=1";

    foreach ($filters as $key => $value) {
        if ($value !== '') {
            if ($key === 'stock') {
                $conditions .= " AND $key $value";
            } else {
                $conditions .= " AND $key LIKE '%$value%'";
            }
        }
    }

    return $conditions;
}


function getAll($conn, $category, $filters = array()) {
    $conditions = buildConditions($filters);
    $result = mysqli_query($conn, "select * from $category WHERE $conditions");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


