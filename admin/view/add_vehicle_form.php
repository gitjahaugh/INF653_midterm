<?php include('view/header.php'); ?>


        <h2>Add Vehicle</h2>
        <form action="." method="POST" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_vehicle">
            <div class="add_inputs">
                <label>Make:</label>
                <select name="make_id" required>
                    <option value="">Please Select</option>
                    <?php foreach ($makes as $make) : ?>
                    <option value="<?= $make['makeID']; ?>">
                        <?= $make['makeName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Type:</label>
                <select name="type_id" requried>
                    <option value="">Please Select</option>
                    <?php foreach ($types as $type) : ?>
                    <option value="<?= $type['typeID']; ?>">
                        <?= $type['typeName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Class:</label>
                <select name="class_id" required>
                    <option value="">Please Select</option>
                    <?php foreach ($classes as $class) : ?>
                    <option value="<?= $class['classID']; ?>">
                        <?= $class['className']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                <label>Year:</label>
                <input type="number" name="year" id="year" min="1900" max="2099" step="1" value="year"  required>
                <br>
                <label>Model:</label>
                <input type="text" name="model" id="model" maxlength="20" required>
                <br>
                <label>Price:</label>
                <input type="number" name="price" id="price" maxLength="999999" required>
                <br>
                <button class="add_button" type="submit">Add Vehicle</button>
            </div>
        </form>

    <p><a href=" .?action=list_vehicles">View full vehicle list</a><p>
    <p><a href=" .?action=list_makes">View/Edit Vehicle Makes</a></p>
    <p><a href=" .?action=list_types">View/Edit Vehicle Types</a></p>
    <p><a href=" .?action=list_classes">View/Edit Vehicle Classes</a></p>

<?php include('view/footer.php'); ?>