<?php
    session_start();

    if(isset($_POST['submit'])){
        //filter_input() validates or "cleans" transmitted variables
        
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quant = filter_input(INPUT_POST, "quant", FILTER_VALIDATE_INT);    
        //if filter fails it returns false or null

        //checking there are no null or false value after filter
        if($name && $price && $quant){

            $product = [
                "name" => $name,
                "price" => $price,
                "quant" => $quant,
                "total" => $price*$quant
            ];

            $_SESSION['products'][] = $product;
        }
    }

    header("Location:index.php");
?>