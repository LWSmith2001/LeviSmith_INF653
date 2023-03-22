<footer>

    <hr>
    <?php
        // ugly ugly bad inelegant I no longer wish to code
        if ($current_page != "list_vehicles") {
            echo '<a href=".?action=list_vehicles">List all vehicles</a> ';
        }
        if ($current_page != "add_vehicle") {
            echo '<a href=".?action=add_vehicle">Add vehicle</a> ';
        }
        if ($current_page != "make_edit") {
            echo '<a href=".?action=add_make">Edit Makes</a> ';
        }
        if ($current_page != "type_edit") {
            echo '<a href=".?action=add_type">Edit Types</a> ';
        }
        if ($current_page != "class_edit") {
            echo '<a href=".?action=add_class">Edit Classes</a> ';
        }
        // works though
        ?>  
    <br><br>
    &copy; Zippy Used Autos 2021
    
</footer>

</html>
