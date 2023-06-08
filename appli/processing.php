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

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "delete":
                if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])){
                    unset($_SESSION['products'][$_GET['id']]);
                    
                    header("Location: recap.php");
                    die();
                }

            case "clear":
                unset($_SESSION['products']);
                break;
            
            case "plusOne":
                $_SESSION['products'][$_GET['id']]['quant']++;
                //calc new total
                $_SESSION['products'][$_GET['id']]['total']=$_SESSION['products'][$_GET['id']]['price']*$_SESSION['products'][$_GET['id']]['quant'];
                header("Location: recap.php");
                die();
                
            case "minusOne":
                if($_SESSION['products'][$_GET['id']]['quant']==1){
                    header("Location: recap.php");
                    die();
                }
                else {
                    $_SESSION['products'][$_GET['id']]['quant']--;
                    $_SESSION['products'][$_GET['id']]['total']=$_SESSION['products'][$_GET['id']]['price']*$_SESSION['products'][$_GET['id']]['quant'];
                    header("Location: recap.php");
                    die();
                }
        }
    }
    

    header("Location:index.php");
?>