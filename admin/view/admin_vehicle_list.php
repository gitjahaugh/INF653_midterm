<?php include('view/header.php'); ?>

    <h2>Search Inventory</h2>
    <form action="." method="GET" id="filter_vehicles" class="filter_vehicles">
        <input type="hidden" name="action" value="list_admin_vehicles">
        <select name="make_id">
        <option value="0">View All Makes</option>
        <?php foreach ($makes as $make) : ?>
        <?php if ($make_id == $make['makeID']) { ?>
            <option vlaue="<?= $make['makeID'] ?>"selected>
        <?php } else { ?>
            <option value="<?= $make['makeID'] ?>">
        <?php } ?>
            <?= $make['makeName'] ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        <select name="type_id">
        <option value="0">View All Types</option>
        <?php foreach ($types as $type) : ?>
        <?php if ($type_id == $type['typeID']) { ?>
            <option vlaue="<?= $type['typeID'] ?>"selected>
        <?php } else { ?>
            <option value="<?= $type['typeID'] ?>">
        <?php } ?>
            <?= $type['typeName'] ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        <select name="class_id">
        <option value="0">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
        <?php if ($class_id == $class['classID']) { ?>
            <option vlaue="<?= $class['classID'] ?>"selected>
        <?php } else { ?>
            <option value="<?= $class['classID'] ?>">
        <?php } ?>
            <?= $class['className'] ?>
        </option>
        <?php endforeach; ?>
        </select>
        <br>
        <span>Sort By:</span>
        <input type="radio" id="price" name="sort" value="price" <?= $sort == 'price' ? 'checked' : '' ?>>
        <label>Price</label>
        <input type="radio" id="year" name="sort" value="year" <?= $sort == 'year' ? 'checked' : '' ?>>
        <label>Year</label>

        <input type="submit" value="Search">
    </form>

    <h2>Vehicle Inventory<h2>
    <section class="vehicle__table">
        <?php if($vehicles) { ?>
            <div>
                <table>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Price</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?= $vehicle['year']; ?></td>
                        <?php if(!$vehicle['makeID']) { ?>
                                <td>No make matching search.</td>
                            <?php } else { ?>
                                <td><?= get_make_name($vehicle['makeID']); ?></td>
                            <?php } ?>
                            <td><?= $vehicle['model']; ?></td>
                            <?php if (!get_type_name($vehicle['typeID'])) { ?>
                                <td>No type matching search.</td>
                            <?php } else { ?>
                                <td><?= get_type_name($vehicle['typeID']); ?></td>
                            <?php } ?>
                            <?php if (!get_class_name($vehicle['classID'])) { ?>
                                <td>No class matching search.</td>
                            <?php } else { ?>
                                <td><?= get_class_name($vehicle['classID']); ?></td>
                            <?php } ?>
                            <td><?= "$".number_format($vehicle['price'], 2); ?></td>
                            <td>
                                <form action="." method="POST">
                                    <input type="hidden" name="action" value="delete_vehicle">
                                    <input type="hidden" name+="vehicle_id" value="<?= $vehicle['vehicleID'] ?>">
                                    <button class="button-removeItem" type="Submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no matching vehicles in Zippy&apos;s inventory. 
            </p>     
        <?php } ?>

    <p><a href=" .?action=vehicle_form">Click Here</a> to add a vehicle.</p>
    <p><a href=" .?action=list_makes">View/Edit Vehicle Makes</a></p>
    <p><a href=" .?action=list_types">View/Edit Vehicle Types</a></p>
    <p><a href=" .?action=list_classes">View/Edit Vehicle Classes</a></p>

<?php include('view/footer.php'); ?>