<?php

function get_all_vehicles_by_price() {
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY price DESC';

    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();

    $statement->closeCursor();
    return $vehicles;
}

function get_all_vehicles_by_year() {
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY year DESC';

    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();

    $statement->closeCursor();
    return $vehicles;
}

?>