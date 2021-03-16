<?php include('View/header.php'); ?>

    <h2>
        Search Inventory
    </h2>
    <?php include('View/vehicle_selector_form.php'); ?>

    <h2>Vehicle Inventory<h2>
    <section>
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
                        </tr>
                        <?php foreach ($vehicles as $vehicle) :?>
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
                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>  
        <?php } else { ?>
            <p>
                There are no matching vehicles in Zippy&apos;s inventory. 
            </p>     
        <?php } ?>
</section>


<?php include('View/footer.php'); ?>