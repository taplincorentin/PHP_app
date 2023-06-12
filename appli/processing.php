<?php
    session_start();
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;
    if(isset($_POST['submit'])){
        
        //filter_input() validates or "cleans" transmitted variables
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $quant = filter_input(INPUT_POST, "quant", FILTER_VALIDATE_INT);
        $tmpName = $_FILES['file']['tmp_name'];
        //if filter fails it returns false or null

        //giving unique name to file
        $fileName  = uniqid("", true);
        
        move_uploaded_file($tmpName, './upload/'.$fileName);

        //checking there are no null or false value after filter
        if($name && $price && $quant){

            $product = [
                "name" => $name,
                "price" => $price,
                "quant" => $quant,
                "total" => $price*$quant,
                "fileName" => $fileName
            ];

            $_SESSION['products'][] = $product;
            $_SESSION['message'] = $name." added to cart";
        
        }
        else {
            $_SESSION['message'] = "! Wrong input ! Not added to cart";
        }
        header("Location: recap.php");
    }

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case "delete":
                if(isset($id) && isset($_SESSION['products'][$id])){
                    $name1=$_SESSION['products'][$id]['name'];
                    unset($_SESSION['products'][$id]);
                    $_SESSION['message'] = $name1." removed from cart";
                    header("Location: recap.php");
                    die();
                }

            case "clear":
                unset($_SESSION['products']);
                $_SESSION['message'] = "Cart emptied";
                header("Location:index.php");
                die();
            
            case "plusOne":
                $name1=$_SESSION['products'][$id]['name'];
                $_SESSION['products'][$id]['quant']++;
                //calc new total
                $_SESSION['products'][$id]['total']+=$_SESSION['products'][$id]['price'];
                
                $_SESSION['message'] = "plus one ".$name1;
                
                header("Location: recap.php");
                die();
                
            case "minusOne":
                if($_SESSION['products'][$id]['quant']==1){
                    header("Location: recap.php");
                    die();
                }
                else {
                    $name1=$_SESSION['products'][$id]['name'];
                    $_SESSION['products'][$id]['quant']--;
                    $_SESSION['products'][$id]['total']-=$_SESSION['products'][$id]['price'];
                    
                    $_SESSION['message'] = "minus one ".$name1;
                    
                    header("Location: recap.php");
                    die();
                }
        }
    }
    

    
?>