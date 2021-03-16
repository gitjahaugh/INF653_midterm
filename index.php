<?php 

    // Require the databases from the model folder for the controoler.
    require('model/database.php');
    require('model/vehicles_db.php');
    require('model/types_db.php');
    require('model/classes_db.php');
    require('model/makes_db.php');


    $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if(!$action) {
            $action = 'list_vehicles';
        }
    }

    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    
    switch($action) {
        case "list_vehicles":
            if($make_id) {
                $vehicles = get_vehicles_by_make($make_id, $sort);
            } elseif ($type_id) {
                $vehicles = get_vehicles_by_type($type_id, $sort);
            } elseif ($class_id) {
                $vehicles = get_vehicles_by_class($class_id, $sort);
            } else {
                $vehicles = get_all_vehicles($sort);
            }
            include('View/vehicle_list.php');
            break;
        default: 
            $vehicles = get_all_vehicles($sort);
            include('View/vehicle_list.php');
    }


