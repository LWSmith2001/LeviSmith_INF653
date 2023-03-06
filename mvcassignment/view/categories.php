<?php include("header.php"); ?>


<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
<title>To-Do List</title>
<link rel="stylesheet" href="view/main.css">
</head>
<body>

<?php 
$categories = get_all_categories();
?>

<?php if ($categories) { ?>


    <?php foreach($categories as $category) {

        $categoryName = $category['categoryName'];
        $categoryID = $category['categoryID'];

    ?>

    <div id="entry">
        <form action="." method="POST" id="deletebutton">
            <input type="hidden" name="action" value="delete_category">
            <input type="hidden" name="categoryID" value="<?php echo $categoryID?>">
            <button>x</button>
        </form>
        

        <h3><?php echo $categoryName ?></h3>
        <p>Category ID: <?php echo $categoryID ?></p>
    </div>
    <br>

    <?php } ?>
<?php } else { ?>
    <div id="noresult">
        No Results! Get more stuff to do!
    </div>
<?php } ?>




<footer>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add_category">
        <label for="categoryName">Category Name:</label>
        <input type="text" id="categoryName" name="categoryName" required autocomplete="off">
        <button>Add Category</button>
    </form>
</footer>



</body>
</html>