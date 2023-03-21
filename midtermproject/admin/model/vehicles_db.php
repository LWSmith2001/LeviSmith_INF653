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

function delete_vehicle($vehicleID) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicleID';
    
    $statement = $db->prepare($query);

    $statement->bindValue('vehicleID', $vehicleID);

    $statement->execute();

    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $makeID, $typeID, $classID) {
    global $db;
    $query = 'INSERT INTO vehicles
              (year, model, price, typeID, classID, makeID) 
              VALUES 
              (:year, :model, :price, :typeID, :classID, :makeID);';
    
    $statement = $db->prepare($query);

    $statement->bindValue('year', $year);
    $statement->bindValue('model', $model);
    $statement->bindValue('price', $price);
    $statement->bindValue('typeID', $typeID);
    $statement->bindValue('classID', $classID);
    $statement->bindValue('makeID', $makeID);

    $statement->execute();

    $statement->closeCursor();
}

?>