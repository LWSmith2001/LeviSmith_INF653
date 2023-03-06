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
$results = show_all_entries();
$categories = get_all_categories();
$idToShow = filter_input(INPUT_POST, "idToShow", FILTER_VALIDATE_INT);
?>

<?php if ($results) { ?>

    <p>Filter by Category:</p>
    <form action="<?php echo $_SERVER['PHP_SELF']?>", method="POST">
        <select name="idToShow" id="idToShow">
            <option value=null>Show All</option>
            <?php foreach($categories as $category) { ?>
                <option value="<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName']?></option>
            <?php } ?>
        </select>
        <button>Filter</button>
    </form>

    <?php foreach($results as $result) {

        $title = $result["Title"];
        $description = $result["Description"];
        $id = $result["ItemNum"];
        $categoryName = $result["categoryName"];

    ?>
        <?php if ($result['categoryID'] == $idToShow || $idToShow == null) { ?>
            <div id="entry">
                <form action="." method="POST" id="deletebutton">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <button>x</button>
                </form>
                

                <h3><?php echo $title ?></h3>
                <h4><?php echo $description ?></h4>
                <h6><?php echo $categoryName ?></h6>
            </div>
            <br>
        <?php } ?>
    <?php } ?>
<?php } else { ?>
    <div id="noresult">
        No Results! Get more stuff to do!
    </div>
<?php } ?>

<footer>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required autocomplete="off">
        <br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required autocomplete="off">
        <br>
        <label for="categoryID">Category:</label>
        <select name="categoryID" id="categoryID" required>
            <?php foreach($categories as $category) {?>
                <option value="<?=$category["categoryID"]?>"><?=$category["categoryName"]?></option>
            <?php } ?>
        </select>
        <button>Add Entry</button>
    </form>
</footer>



</body>
</html>