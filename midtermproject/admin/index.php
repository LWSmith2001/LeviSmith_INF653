<?php 
require("model/database.php");
require("model/vehicles_db.php");
require("model/types_db.php");
require("model/classes_db.php");
require("model/makes_db.php");

// database values
$types = get_all_types();
$makes = get_all_makes();
$classes = get_all_classes();

// filter variables
$make_select = filter_input(INPUT_GET, 'make_select', FILTER_VALIDATE_INT);
$type_select = filter_input(INPUT_GET, 'type_select', FILTER_VALIDATE_INT);
$class_select = filter_input(INPUT_GET, 'class_select', FILTER_VALIDATE_INT);

$sort_by = filter_input(INPUT_GET, 'sort_by', FILTER_UNSAFE_RAW);
if (!$sort_by) {
    $sort_by = "price";
}

if ($sort_by == "year") {
    $vehicles = get_all_vehicles_by_year();
} else {
    $vehicles = get_all_vehicles_by_price();
}

$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'new_vehicle_year', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'new_vehicle_model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'new_vehicle_price', FILTER_VALIDATE_INT);
$makeID = filter_input(INPUT_POST, 'new_vehicle_make', FILTER_VALIDATE_INT);
$typeID = filter_input(INPUT_POST, 'new_vehicle_type', FILTER_VALIDATE_INT);
$classID = filter_input(INPUT_POST, 'new_vehicle_class', FILTER_VALIDATE_INT);

$makeID = filter_input(INPUT_POST, 'delete_make', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'add_make', FILTER_UNSAFE_RAW);

$typeID = filter_input(INPUT_POST, 'delete_type', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, 'add_type', FILTER_UNSAFE_RAW);

$classID = filter_input(INPUT_POST, 'delete_class', FILTER_VALIDATE_INT);
$class = filter_input(INPUT_POST, 'add_class', FILTER_UNSAFE_RAW);

if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
        if(!$action) {
            $action = "list_vehicles";
        }
    }
}

switch($action) {

    case("delete_vehicle"):
        delete_vehicle($vehicleID);
        $vehicles = get_all_vehicles_by_price();
        $current_page = "list_vehicles";
        include("view/list_vehicles.php");
        break;
    case("add_vehicle"):
        if (isset($year)) {
            add_vehicle($year, $model, $price, $makeID, $typeID, $classID);
        }
        $current_page = "add_vehicle";
        include("view/add_vehicle.php");
        break;


    case("delete_make"):
        try{
            delete_make($makeID);
            $makes = get_all_makes();
            $current_page = "make_edit";
            include("view/make_edit.php");
        } catch(PDOException $e) {
            $error_message = "You cannot delete a make if a vehicle with that make is in inventory";
            include("view/error.php");
        }
        break;
    case("add_make"):
        if (isset($make)) {
            add_make($make);
            $makes = get_all_makes();
        }
        $current_page = "make_edit";
        include("view/make_edit.php");
        break;


    case("delete_type"):
        try{
            delete_type($typeID);
            $types = get_all_types();
            $current_page = "type_edit";
            include("view/type_edit.php");
        } catch(PDOException $e) {
            $error_message = "You cannot delete a type if a vehicle with that type is in inventory";
            include("view/error.php");
        }
        break;
    case("add_type"):
        if(isset($type)) {
            add_type($type);
            $types = get_all_types();
        }
        $current_page = "type_edit";
        include("view/type_edit.php");
        break;

    case("delete_class"):
        try{
            delete_class($classID);
            $classes = get_all_classes();
            $current_page = "class_edit";
            include("view/class_edit.php");
        } catch(PDOException $e) {
            $error_message = "You cannot delete a class if a vehicle with that class is in inventory";
            include("view/error.php");
        }
        break;
    case("add_class"):
        if(isset($class)) {
            add_class($class);
            $classes = get_all_classes();
        }
        $current_page = "class_edit";
        include("view/class_edit.php");
        break;

    default:
        $current_page = "list_vehicles";
        include("view/list_vehicles.php");
        break;


}
?>