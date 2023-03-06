<?php 

function add_entry($title, $description, $categoryID) {
    global $db;

    $query = 'INSERT INTO todoitems(Title, Description, categoryID) VALUES (:title, :description, :categoryID)';

    $statement = $db->prepare($query);

    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':categoryID', $categoryID);

    $statement->execute();

    $statement->closeCursor();
}

function show_all_entries() {
    global $db;
    
    $query = 'SELECT t.Title, t.Description, c.categoryName, t.ItemNum, c.categoryID 
              FROM todoitems AS t 
              INNER JOIN categories AS c 
              ON c.categoryID = t.categoryID';
    
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