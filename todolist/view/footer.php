
<footer>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="action" value="add">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required autocomplete="off">
        <br>
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required autocomplete="off">
        <br>
        <button>Add Entry</button>
    </form>
</footer>