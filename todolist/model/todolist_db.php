<?php 

function add_entry($title, $description) {
    global $db;

    $query = 'INSERT INTO todoitems(Title, Description) VALUES (:title, :description)';

    $statement = $db->prepare($query);

    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);

    $statement->execute();

    $statement->closeCursor();
}

function show_all_entries() {
    global $db;
    
    $query = 'SELECT * FROM todoitems ORDER BY ItemNum';
    
    $statement = $db->prepare($query);
    
    $statement->execute();
    
    $entries = $statement->fetchAll();

    $statement->closeCursor();

    return $entries;
}

function remove_entry($id) {
    global $db;

    $query = 'DELETE FROM todoitems WHERE ItemNum = :id';

    $statement = $db->prepare($query);

    $statement->bindValue(':id', $id);

    $statement->execute();

    $statement->closeCursor();

}


?>