<?php 

?>


<!doctype HTML>

<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Get Parameter Assignment</title>
		<meta name="description" content="A webpage displaying assignment 1 requirements">
		<meta name="author" content="Levi Smith">
		<link rel="stylesheet" href="main.css">
	</head>

	<body>	
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<div class="bodycontent">
		<label for="fname">First Name:</label>
		<input type="text" id="fname" name="fname" autocomplete="off">
		<br>
		<label for="lname">Last Name:</label>
		<input type="text" id="lname" name="lname" autocomplete="off">
		<br>
		<label for="age">Age:</label>
		<input type="number" id="age" name="age" autocomplete="off"><br><br><br>
		<button type="submit" formmethod="get">Get</button> <br><br>	
		<?php
		if ($_GET['fname'] != "" && $_GET['lname'] != "") {
			echo "Hello, my name is ". $_GET['fname']. " ". $_GET['lname']. "<br>";
		}
		
		if (!empty($_GET['age'])) {
			echo "I am ". $_GET['age']. " years old and ";
			if ($_GET['age'] < 18) {
				echo "I am not old enough to vote in the United States". "<br>";
			} else {
				echo "I am old enough to vote in the United States". "<br>";
			}
		}?>
		</div>
	</body>
	<footer>
		<div class="footercontent">
			<?php
			echo "Today is ". date("m/d/Y") . "<br>";
			?>
		</div>
	</footer>
	
</html>
