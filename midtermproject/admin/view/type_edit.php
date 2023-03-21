<?php include("header.php"); ?>

<body>
    Vehicle Type List <br>

    <table>
        <tr>
            <th>Name</th>
        </tr>

        <?php foreach($types as $type) {?>
            <tr>
                <td><?=$type['type']?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name="delete_type" value=<?=$type['typeID']?>>
                        <button>Remove</button>
                    </form>
                </td>
            <tr>
        <?php }?>
    </table> <br>

    Add Vehicle Type <br>
    <form action="." method="POST">
        <label for="add_type">
            <input type="hidden" name="action" value="add_type">
            Name:<br>
            <input type="text" name="add_type">
        </label>
        <button>Add Type</button>
    <form>
</body>

<?php include("footer.php"); ?>