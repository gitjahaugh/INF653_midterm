<?php

    $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_STRING);

    switch($action) {
        case 'list_types':
            $types = get_types();
            include('./view/type_list.php');
            break;
        case 'add_type':
            add_type($type_name);
            header("Location: .?action=list_types");
            break;
        case 'delete_type':
            if($type_id) {
                try {
                    delete_type($type_id);
                } catch (PDOException $e) {
                    $error = "A type cannot be deleted if a vehicle exist in the type.";
                    include('../errors/error.php');
                    exit();
                }
                header("Location: .?action=list_types");
            }
            break;
    }