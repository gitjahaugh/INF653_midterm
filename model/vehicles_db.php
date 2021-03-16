<?php 

    function get_all_vehicles($sort) {
        global $db;
        if ($sort == 'price') {
        $query = 'SELECT *
                    FROM vehicles 
                    ORDER BY price DESC ';
        } elseif ($sort == 'year') {
            $query = 'SELECT *
            FROM vehicles 
            ORDER BY year DESC ';
        } else {
            $query = 'SELECT *
            FROM vehicles 
            ORDER BY vehicleID ';
        }
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_make($make_id, $sort) {
        global $db;
        if ($sort == 'price') {
            $query = 'SELECT * 
                        FROM vehicles
                        WHERE makeID = :make_id;
                        ORDER BY price DESC ';
            } else {
                $query = 'SELECT *
                            FROM vehicles
                            WHERE makeID = :make_id
                            ORDER BY year DESC';
            }        
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_type($type_id, $sort) {
        global $db;
        if ($sort == 'price') {
            $query = 'SELECT * 
                        FROM vehicles
                        WHERE typeID = :type_id;
                        ORDER BY price DESC ';
            } else {
                $query = 'SELECT *
                            FROM vehicles
                            WHERE typeID = :type_id;
                            ORDER BY year DESC';
            }
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function get_vehicles_by_class($class_id, $sort) {
        global $db;
        if ($sort == 'price') {
            $query = 'SELECT * 
                        FROM vehicles
                        WHERE classID = :class_id;
                        ORDER BY price DESC ';
            } else {
                $query = 'SELECT *
                            FROM vehicles
                            WHERE classID = :class_id
                            ORDER BY year DESC';
            }
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    function delete_vehicle($vehicle_id) {
        global $db; 
        $query = 'DELETE FROM vehicles
                    WHERE vehicleID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statemetn->closeCursor();
    }

    function add_vehicle($year, $model, $price, $makeID, $typeID, $classID) {
        global $db;
        $query = 'INSERT INTO vehicles
                        (year, model, price, makeID, typeID, classID)
                    VALUES
                        (:year, :model, :price, :makeID, :typeID, :classID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':makeID', $makeID);
        $statement->bindValue(':typeID', $typeID);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }
