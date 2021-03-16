<?php include('view/header.php'); ?>

    <?php if($types) { ?>
    <h2>Vehicle types<h2>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($types as $type) : ?>
            <tr>
                <td><?= $type['typeName']; ?></td>
                <td class="list__removeItem">
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $type['typeID']; ?>">
                        <button class="button-removeItem" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php } else { ?>
        <p>No types exist yet.</p>
    <?php } ?>

    <section id="add" class="add">
        <h3>Add Type</h3>
        <form action="." method="POST" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_type">
            <div class="add__inputs">
                <label>Name:</label>
                <input type="text" name="type_name" maxlength="20" placeholder="Name" autofocus required> 
            </div>
            <button class="add_button" type="submit">Add Type</button>
        </form>
    </section>
    <br>
    <p><a href=" .?action=list_vehicles">View full vehicle list</a><p>
    <p><a href=" .?action=vehicle_form">Click Here</a> to add a vehicle.</p>
    <p><a href=" .?action=list_makes">View/Edit Vehicle Makes</a></p>
    <p><a href=" .?action=list_classes">View/Edit Vehicle Classes</a></p>


<?php include('view/footer.php'); ?>