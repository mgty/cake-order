<!DOCTYPE html>
<html>
<head>
	<title>Sweet Lily's Bakery</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h2>Sweet Lily's Bakery</h2>
	<h4>Your Cake Order</h4>
	<?php
		$size_price = ["medium" => 80, "large" => 150, "wedding" => 250];

		//size
		if($size == NULL){
				echo "Please choose a cake size."
			} else {
				$size = filter_input(INPUT_POST, 'size');
					echo "You selected size $size @ $size_price[$size]<br>";
			};


		//frosting
		$frosting_price = ["chocolate", "vanilla", "strawberry", "caramel"];

			if($frosting == NULL){
				echo "Please choose a frosting."
			} else {
				echo "You selected $frosting frosting. Great Choice! <br>"
			};


		//toppings
		$toppings = filter_input(INPUT_POST, 'toppings', 
			FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);


		if ($toppings > 1){
			$num_toppings = count($toppings);
				echo "You have selected $toppings at $20 each<br>";
				foreach ($toppings as $key => $value) {
				echo "$value $20<br>";
			} elseif ($toppings == 1) {
				echo "You have selected this $num_toppings @ $20<br>";
				foreach ($toppings as $key => $value) {
					echo "$value $20<br>";
			} else {
				foreach ($toppings as $key => $value) {
					echo "$value $20<br>";
			}

		}

		/*if ($toppings =! NULL){
			$num_toppings = count($toppings);
				if ($toppings == 1){
					echo "You have selected this $num_toppings @ $20<br>";
					foreach ($toppings as $key => $value){
						echo "$value $20<br>";
					} else {
					echo "You have selected these $num_toppings @ $20 each<br>";
					foreach ($toppings as $key => $value) {
						echo "$value $20<br>";
			}
				};
		}*/

		//extras
		$extra = filter_input(INPUT_POST, 'extra',
			FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

		if ($extra !== NULL){
			$num_extra = count ($extra);
			echo "You also chose @ $10 each: <br>";
			foreach ($extra as $key2 => $value2) {
				echo "$value2 $10 <br>";
			} 
		} else {
				echo "No extras selected.";
		}

		//requests

	?>

</body>
</html>