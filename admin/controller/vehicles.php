<?php 

    switch($action) {
        case 'vehicle_form':
            include('./view/add_vehicle_form.php');
            break;
        case 'add_vehicle':
            if ($make_id && $type_id && $class_id && $year && $model && $price) {
                add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
                header('Location: .?action=list_vehicles');
            } else {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('../errors/error.php');
                exit();
            }
            break;
        case 'delete_vehicle':
            if($vehicle_id) {
                delete_vehicle($vehicle_id);
                header('Location: .?action=list_vehicles');
            } else {
                $error = "Missing of incorrect vehicle id.";
                include('../errors/error.php');
            }
            break;
    }