<?php include("header.php"); ?>

<body>
    <form action="." method="POST">
        Add Vehicle <br><br>
        <input type="hidden" name="action" value="add_vehicle">
        <label for="new_vehicle_make">
            Make: <br>
            <select name="new_vehicle_make">
                <?php foreach($makes as $make) { ?>
                    <option value=<?=$make['makeID']?>><?=$make['make']?></option>
                <?php } ?>
            </select>
        </label>

        <br><br>

        <label for="new_vehicle_type">
            Type: <br>
            <select name="new_vehicle_type">
                <?php foreach($types as $type) { ?>
                    <option value=<?=$type['typeID']?>><?=$type['type']?></option>
                <?php } ?>
            </select>
        </label>
        
        <br><br>

        <label for="new_vehicle_class">
            Class: <br>
            <select name="new_vehicle_class">
                <?php foreach($classes as $class) { ?>
                    <option value=<?=$class['classID']?>><?=$class['class']?></option>
                <?php } ?>
            </select>
        </label>

        <br><br>

        <label for="new_vehicle_year">
            Year: <br>
            <input type="text" name="new_vehicle_year">
        </label>

        <br><br>

        <label for="new_vehicle_model">
            Model: <br>
            <input type="text" name="new_vehicle_model">
        </label>

        <br><br>

        <label for="new_vehicle_price">
            Price: <br>
            <input type="text" name="new_vehicle_price">
        </label>

        <br><br>

        <button>Add Vehicle</button>
    </form>
</body>

<?php include("footer.php"); ?>