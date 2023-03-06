<?php 

require("model/database.php");
require("model/todolist_db.php");
require("model/category_db.php");

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

$categoryID = filter_input(INPUT_POST, "categoryID", FILTER_VALIDATE_INT);
$categoryName = filter_input(INPUT_POST, "categoryName", FILTER_UNSAFE_RAW);

if(!$id) {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
}

if(!$categoryID) {
    $categoryID = filter_input(INPUT_GET, "categoryID", FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);

if(!$action) {

    $action = filter_input(INPUT_GET, "action", FILTER_UNSAFE_RAW);

    if(!$action) {
        $action = "entries";
    }
}

$categories = get_all_categories();

switch($action) {

    case("delete"):
        remove_entry($id);
        include("view/entries.php");
        break;

    case("add"):
        add_entry($title, $description, $categoryID);
        include("view/entries.php");
        break;
    
    case("delete_category"):
        remove_category($categoryID);
        include("view/categories.php");
        break;

    case("add_category"):
        add_category($categoryName);
        include("view/categories.php");
        break;

    case("view_category"):
        include("view/categories.php");
        break;

    default:
        include("view/entries.php");
}

?>


