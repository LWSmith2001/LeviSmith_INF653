<?php

function get_all_types() {
    global $db;

    $query = 'SELECT * FROM types';

    $statement = $db->prepare($query);

    $statement->execute();

    $types = $statement->fetchAll();

    $statement->closeCursor();

    return $types;
}

function typeID_to_type($typeID) {

    global $db;

    $query = 'SELECT type FROM types WHERE typeID = :typeID';

    $statement = $db->prepare($query);

    $statement->bindValue('typeID', $typeID);

    $statement->execute();

    $type = $statement->fetch();

    $statement->closeCursor();

    return $type['type'];

}

?>