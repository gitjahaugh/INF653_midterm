<?php include('view/header.php'); ?>

    <?php if($classes) { ?>
    <h2>Vehicle Classes<h2>

    <table>
        <thead>
            <tr>
                <th>Class</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($classes as $class) : ?>
            <tr>
                <td><?= $class['className']; ?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['classID']; ?>">
                        <button class="button-removeItem" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php } else { ?>
        <p>No classes exist yet.</p>
    <?php } ?>

    <section id="add" class="add">
        <h3>Add Class</h3>
        <form action="." method="POST" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_class">
            <div class="add__inputs">
                <label>Name:</label>
                <input type="text" name="class_name" maxlength="20" placeholder="Name" autofocus required> 
            </div>
            <button class="add_button" type="submit">Add Class</button>
        </form>
    </section>
    <br>
    <p><a href=" .?action=list_vehicles">View full vehicle list</a><p>
    <p><a href=" .?action=vehicle_form">Click Here</a> to add a vehicle.</p>
    <p><a href=" .?action=list_makes">View/Edit Vehicle Makes</a></p>
    <p><a href=" .?action=list_types">View/Edit Vehicle Types</a></p>

<?php include('view/footer.php'); ?>