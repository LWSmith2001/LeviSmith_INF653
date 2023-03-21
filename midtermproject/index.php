<?php 
require("model/database.php");
require("model/vehicles_db.php");
require("model/types_db.php");
require("model/classes_db.php");
require("model/makes_db.php");

$types = get_all_types();
$makes = get_all_makes();
$classes = get_all_classes();
$vehicles = get_all_vehicles_by_price();

$make_select = filter_input(INPUT_GET, 'make_select', FILTER_VALIDATE_INT);
$type_select = filter_input(INPUT_GET, 'type_select', FILTER_VALIDATE_INT);
$class_select = filter_input(INPUT_GET, 'class_select', FILTER_VALIDATE_INT);

$sort_by = filter_input(INPUT_GET, 'sort_by', FILTER_UNSAFE_RAW);

if ($sort_by == "year") {
    $vehicles = get_all_vehicles_by_year();
}

include("view/list_vehicles.php"); 

?>