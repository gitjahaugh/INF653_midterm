<?php include('view/header.php'); ?>

    <?php if($makes) { ?>
    <h2>Vehicle makes<h2>

    <table>
        <thead>
            <tr>
                <th>Make</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($makes as $make) : ?>
            <tr>
                <td><?= $make['makeName']; ?></td>
                <td class="list__removeItem">
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['makeID']; ?>">
                        <button class="button-removeItem" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?php } else { ?>
        <p>No makes exist yet.</p>
    <?php } ?>

    <section id="add" class="add">
        <h3>Add Make</h3>
        <form action="." method="POST" id="add_form" class="add_form">
            <input type="hidden" name="action" value="add_make">
            <div class="add__inputs">
                <label>Name:</label>
                <input type="text" name="make_name" maxlength="20" placeholder="Name" autofocus required> 
            </div>
            <button class="add_button" type="submit">Add Make</button>
        </form>
    </section>
    <br>
    <p><a href=" .?action=list_vehicles">View full vehicle list</a><p>
    <p><a href=" .?action=vehicle_form">Click Here</a> to add a vehicle.</p>
    <p><a href=" .?action=list_types">View/Edit Vehicle Types</a></p>
    <p><a href=" .?action=list_classes">View/Edit Vehicle Classes</a></p>


<?php include('view/footer.php'); ?>