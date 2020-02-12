<!DOCTYPE html>
<html>
<head>
    <title>Sweet Lily's Bakery</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

    <?php        

        $size_price = ["Small" => 80, "Medium" => 150, "Large" => 250];

        //size
        $size = filter_input(INPUT_POST, 'size');
        $size_message="Size ($$size_price[$size]): $size";
        if($size == NULL){
                echo "Please select a cake size.";
            } else {
                echo "";
            };


        //frosting
        $frosting = filter_input(INPUT_POST, 'frosting');
        $frosting_price = ["chocolate", "vanilla", "strawberry", "caramel"];
        $frosting_message="Frosting ($20): $frosting<br>";

            if($frosting == NULL){
                echo "Please choose a frosting.";
            } else {
                echo "";
            };


        //toppings
        $toppings = filter_input(INPUT_POST, 'toppings', 
            FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    

        //extras

        $extras = filter_input(INPUT_POST, 'extras',
            FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);


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
        


        //Final Calculation:
        $total_size_price = $size_price[$size];
        $total_frosting_price = 20;
        $total_toppings = count($toppings) * 20;
        $total_extras = count($extras) * 10;
        $total = $total_size_price + $total_frosting_price + $total_toppings + $total_extras;
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        $address = filter_input(INPUT_POST, 'address');
        $full_name = filter_input(INPUT_POST, 'full_name');

        $total_price_formatted = "$".number_format($total, 2); 

    ?>
<br>
<div class="receipt-page-container container">
    <div class="row">
            <div class="second-column col-sm-12">
                <p class="page-title">Sweet Lily's Bakery - Order Form</p>
                <p class="option-title"><?php echo"$size_message"?></p>
                <p class="option-title"><?php echo"$frosting_message"?></p>
                <p class="option-title">
                    <?php 
                        if ($toppings != NULL ){
                           echo "Topping(s) ($20 each): <br>";
                                foreach ($toppings as $key => $value) {
                                echo "&#8226; $value<br>";
                            }
                        } else {
                            echo "No toppings selected..<br>";
                        }
                    ?>
                </p>

                <p class="option-title">
                    <?php
                        if ($extras != NULL){
                            echo "Extra(s) ($10 each): <br>";
                            foreach ($extras as $key3 => $value3) {
                                echo "&#8226; $value3<br>";
                            }
                        }
                    ?>
                </p>
                <p class="option-title">
                    <?php
                        if ($requests != ''){
                            echo "You made this request: <br> '<i>$requests</i>'.<br>
                             We will do our best to honor it."; 
                        }
                    ?>
                </p>

                <p class="option-title">Your total amount due on delivery is <?php echo $total_price_formatted;?>
                <br>
                Thanks for ordering <?php echo $full_name;?>. Your cake will be delivered to: 
                <?php echo "$address."?>
                <br>
                We will call phone number: <?php echo " $phone_number when it's on the way. <br><br>"?>

                Thanks for ordering at Sweet Lily's Bakery!
                </p>
            </div>

        </div>
</div>

</body>
</html>