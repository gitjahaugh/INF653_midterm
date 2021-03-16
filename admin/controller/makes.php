<?php

    $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_STRING);

    switch($action) {
        case 'list_makes':
            $makes = get_makes();
            include('./view/make_list.php');
            break;
        case 'add_make':
            add_make($make_name);
            header("Location: .?action=list_makes");
            break;
        case 'delete_make':
            if($make_id) {
                try {
                    delete_make($make_id);
                } catch (PDOException $e) {
                    $error = "A make cannot be deleted if a vehicle exist in the make.";
                    include('../errors/error.php');
                    exit();
                }
                header("Location: .?action=list_makes");
            }
            break;
    }