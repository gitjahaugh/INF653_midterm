<form action="." method="GET" id="filter_vehicles" class="filter_vehicles">
        <input type="hidden" name="action" value="list_vehicles">
            <select name="make_id">
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <?php if ($make_id == $make['makeID']) { ?>
                    <option value="<?= $make['makeID'] ?>" selected>
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
                    <option value="<?= $type['typeID'] ?>" selected>
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
                    <option value="<?= $class['classID'] ?>" selected>
                <?php } else { ?>
                    <option value="<?= $class['classID'] ?>">
                <?php } ?>
                    <?= $class['className'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <span>Sort By:</span>
            <input type="radio" id="price" name="sort" value="price"<?= $sort == 'price' ? 'checked' : '' ?>>
            <label>Price</label>
            <input type="radio" id="year" name="sort" value="year" <?= $sort == 'year' ? 'checked' : '' ?>>
            <label>Year</label>
                
            <input type="submit" value="Search">
    </form>