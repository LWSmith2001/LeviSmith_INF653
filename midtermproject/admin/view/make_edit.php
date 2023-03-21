<?php include("header.php"); ?>

<body>
    Vehicle Make List <br>

    <table>
        <tr>
            <th>Name</th>
        </tr>

        <?php foreach($makes as $make) {?>
            <tr>
                <td><?=$make['make']?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="delete_make" value=<?=$make['makeID']?>>
                        <button>Remove</button>
                    </form>
                </td>
            <tr>
        <?php }?>
    </table> <br>

    Add Vehicle Make <br>
    <form action="." method="POST">
        <label for="add_make">
            <input type="hidden" name="action" value="add_make">
            Name:<br>
            <input type="text" name="add_make">
        </label>
        <button>Add Make</button>
    <form>
</body>

<?php include("footer.php"); ?>