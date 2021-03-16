<?php

    $class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_STRING);

    switch($action) {
        case 'list_classes':
            $classes = get_classes();
            include('./view/class_list.php');
            break;
        case 'add_class':
            add_class($class_name);
            header("Location: .?action=list_classes");
            break;
        case 'delete_class':
            if($class_id) {
                try {
                    delete_class($class_id);
                } catch (PDOException $e) {
                    $error = "A class cannot be deleted if a vehicle exist in the class.";
                    include('../errors/error.php');
                    exit();
                }
                header("Location: .?action=list_classes");
            }
            break;
    }