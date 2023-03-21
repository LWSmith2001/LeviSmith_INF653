<?php include("header.php"); ?>

<body>
    Vehicle Class List <br>

    <table>
        <tr>
            <th>Name</th>
        </tr>

        <?php foreach($classes as $class) {?>
            <tr>
                <td><?=$class['class']?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name="delete_class" value=<?=$class['classID']?>>
                        <button>Remove</button>
                    </form>
                </td>
            <tr>
        <?php }?>
    </table> <br>

    Add Vehicle Class <br>
    <form action="." method="POST">
        <label for="add_class">
            <input type="hidden" name="action" value="add_class">
            Name:<br>
            <input type="text" name="add_class">
        </label>
        <button>Add Class</button>
    <form>
</body>

<?php include("footer.php"); ?>