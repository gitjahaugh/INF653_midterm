<?php 
  require('../model/database.php');
  require('../model/vehicles_db.php');
  require('../model/makes_db.php');
  require('../model/types_db.php');
  require('../model/classes_db.php');

  $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
  $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT); 
  $model = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING);
  $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
  
  $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
  if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
  }
  $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
  if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
  }
  $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
  if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
  }
  

  $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
  if(!$vehicle_id){
    $vehicle_id = filter_input(INPUT_GET, 'vehicle_id', FILTER_VALIDATE_INT);
  }

  $make_name = filter_input(INPUT_GET, 'make_name', FILTER_SANITIZE_STRING);

  $type_name = filter_input(INPUT_GET, 'type_name', FILTER_SANITIZE_STRING);
  
  $class_name = filter_input(INPUT_GET, 'class_name', FILTER_SANITIZE_STRING);

  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
  if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
      $action = 'list_vehicles';
    }
  }

  $makes = get_makes();
  $types = get_types();
  $classes = get_classes();

  if ($action == "list_vehicles"){

    
    if($make_id){
      $vehicles = get_vehicles_by_make($make_id, $sort);
    }else if($type_id){  
      $vehicles = get_vehicles_by_type($type_id, $sort);
    }else if($class_id){
      $vehicles = get_vehicles_by_class($class_id, $sort);
    }else{
      $vehicles = get_all_vehicles($sort);
    } 
    include('./view/admin_vehicle_list.php');

  }else if($action == "delete_vehicle"||$action == 'vehicle_form' || $action == "add_vehicle"){
    include('controller/vehicles.php'); 
  }else if($action == "list_makes" || $action == "add_make" || $action == "delete_make"){
    include('controller/makes.php');
  }else if($action == "list_types" || $action == "add_type" || $action == "delete_type"){
    include('controller/types.php');

  }else if($action == "list_classes" || $action == "add_class" || $action == "delete_class"){
    include('controller/classes.php');
  }else{
    $vehicles = get_all_vehicles($sort);
    include('./view/admin_vehicle_list.php');
  }