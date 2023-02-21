<?php 

require("model/database.php");
require("model/todolist_db.php");

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

if(!$id) {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);

if(!$action) {

    $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);

    if(!$action) {
        $action = "entries";
    }
}

switch($action) {

    case("delete");
        remove_entry($id);
        include("view/entries.php");
        break;

    case("add"):
        add_entry($title, $description);
        include("view/entries.php");
        break;

    default:
        include("view/entries.php");
}

?>


