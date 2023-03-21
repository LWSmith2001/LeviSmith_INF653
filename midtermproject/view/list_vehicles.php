<?php include("header.php"); ?>
<body>

    <!-- 'SORT BY' SECTION -->

    <form action="." method="GET">
        <label for="make_select">
            <select name="make_select">

                <option value=null>View all Makes</option>

                <?php
                    foreach ($makes as $make) {
                ?>

                    <option value="<?= $make['makeID']?>"><?= $make['make']?></option>
                
                <?php
                    }
                ?>
            </select>
        </label>

        <br>
        
        <label for="type_select">
            <select name="type_select">

                <option value=null>View all Types</option>

                <?php
                    foreach ($types as $type) {
                ?>

                    <option value="<?= $type['typeID']?>"><?= $type['type']?></option>

                <?php
                    }
                ?>
            </select>
        </label>

        <br>

        <label for="class_select">
            <select name="class_select">

                <option value=null>View all Classes</option>

                <?php
                    foreach ($classes as $class) {
                ?>

                    <option value="<?= $class['classID']?>"><?= $class['class']?></option>

                <?php
                    }
                ?>
            </select>
        </label>

        <br>

        <label for="sort_by">
            Sort By: 
            <input type="radio" name="sort_by" value="price" checked>
            <label for="price">Price</label>
            <input type="radio" name="sort_by" value="year">
            <label for="year">Year</label>
        </label>

        <button>Submit</button>
    </form>

    <!-- END OF 'SORT BY' SECTION -->

    <!-- 'TABLE' SECTION -->

    <table>
        <tr>

            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>

        </tr>

        <?php

            $count = 0;

            foreach ($vehicles as $vehicle) {
                // ugly nested if to filter choices
                if ($vehicle['makeID'] == $make_select || $make_select == null) {
                    if ($vehicle['typeID'] == $type_select || $type_select == null) {
                        if ($vehicle['classID'] == $class_select || $class_select == null) {
        ?>

                            <tr>

                                <td><?=$vehicle['year']?></td>
                                <!--function that selects the single row from respective table,
                                converting id to value-->
                                <td><?=makeID_to_make($vehicle['makeID'])?></td>
                                <td><?=$vehicle['model']?></td>
                                <td><?=typeID_to_type($vehicle['typeID'])?></td>
                                <td><?=classID_to_class($vehicle['classID'])?></td>
                                <td>$<?=$vehicle['price']?>.00</td>

                            </tr>

        <?php 
                        $count += 1;
                        }
                    }
                }
            }
            if ($count == 0) {
                echo "No vehicles with the selected filters";
            }

        ?>

    </table>

    <!-- END OF 'TABLE' SECTION -->

</body>


<?php include("footer.php"); ?>