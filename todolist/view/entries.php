<?php include("header.php"); ?>


<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
<title>To-Do List</title>
<link rel="stylesheet" href="view/main.css">
</head>
<body>

<?php $results = show_all_entries(); ?>

<?php if ($results) { ?>


    <?php foreach($results as $result) {

        $title = $result["Title"];
        $description = $result["Description"];
        $id = $result["ItemNum"];

    ?>

    <div id="entry">
        <form action="." method="POST" id="deletebutton">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <button>x</button>
        </form>
        

        <h3><?php echo $title ?></h3>
        <?php echo $description ?>
    </div>
    <br>

    <?php } ?>
<?php } else { ?>
    <div id="noresult">
        No Results! Get more stuff to do!
    </div>
<?php } ?>
<?php include("footer.php"); ?>



</body>
</html>