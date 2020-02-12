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

        $size_price = ["Small" => 80, "Medium" => 150, "Large" => 250];

        //size
        $size = filter_input(INPUT_POST, 'size');
        if($size == NULL){
                echo "Please choose a cake size.";
            } else {
                echo "Size: $size @ $$size_price[$size]<br>";
            };


        //frosting
        $frosting = filter_input(INPUT_POST, 'frosting');
        $frosting_price = ["chocolate", "vanilla", "strawberry", "caramel"];

            if($frosting == NULL){
                echo "Please choose a frosting.";
            } else {
                echo "Selected Frosting: $frosting. Great Choice!<br>";
            };


        //toppings
        $toppings = filter_input(INPUT_POST, 'toppings', 
            FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        
        
        if ($toppings != NULL ){
           echo "Topping(s) ($20 each): <br>";
                foreach ($toppings as $key => $value) {
                echo "&#8226; $value<br>";
            }
        } else {
            echo "No toppings selected..<br>";
        }

        //extras

        $extras = filter_input(INPUT_POST, 'extras',
            FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

        if ($extras != NULL){
            echo "Extra(s) ($10 each): <br>";
            foreach ($extras as $key3 => $value3) {
                echo "&#8226; $value3<br>";
            }
        }

        /* if ($toppings > 1){
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

        
    

        //requests
        $requests = filter_input(INPUT_POST, 'requests');
        $requests = nl2br($requests, false);
        if ($requests != ''){
            echo "You made this request: <br> '<i>$requests</i>'.<br>
             We will do our best to honor it."; 
        }


        //Final Calculation:
        $total_size_price = $size_price[$size];
        $total_frosting_price = 20;
        $total_toppings = count($toppings) * 20;
        $total_extras = count($extras) * 10;
        $total = $total_size_price + $total_frosting_price + $total_toppings + $total_extras;
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        $address1 = filter_input(INPUT_POST, 'address1');
        $address2 = filter_input(INPUT_POST, 'address2');

        $total_price_formatted = "$".number_format($total, 2); 

    ?>
<br>
<p>You total amount due on delivery is <?php echo $total_price_formatted;?></p>
<p>Your cake will be delivered to: 
<?php echo "$address1 <br> $address2"?>
<br>
We will call phone number: <?php echo " $phone_number when it's on the way. "?>
Thanks for ordering at Sweet Lily's Bakery!
</p>

</body>
</html>