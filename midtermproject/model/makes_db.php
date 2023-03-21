<?php

function get_all_makes() {
    global $db;

    $query = 'SELECT * FROM makes';

    $statement = $db->prepare($query);

    $statement->execute();

    $makes = $statement->fetchAll();

    $statement->closeCursor();

    return $makes;
}

function makeID_to_make($makeID) {

    global $db;

    $query = 'SELECT make FROM makes WHERE makeID = :makeID';

    $statement = $db->prepare($query);

    $statement->bindValue('makeID', $makeID);

    $statement->execute();

    $make = $statement->fetch();

    $statement->closeCursor();

    return $make['make'];

}

?>