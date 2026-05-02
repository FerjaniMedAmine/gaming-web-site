<?php
function buildConditions($filters) {
    $conditions = "1=1";
    if (is_array($filters)) {
        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $conditions .= " AND $key = '$value'";
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


